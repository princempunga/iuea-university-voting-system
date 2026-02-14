<?php

namespace App\Http\Controllers;

use App\Events\VoteCast;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'election_id' => 'required|integer',
            'candidate_id' => 'required|integer',
        ]);

        $user = $request->user();
        $electionId = $request->input('election_id');
        $candidateId = $request->input('candidate_id');

        // 1. Snapshot lookups (Quick memory-only check if cached, but for now direct)
        $election = Election::findOrFail($electionId);

        // 2. Mission Critical Security Checks
        if (!$election->is_active || $election->status !== 'active') {
            return back()->with('error', 'Election is inactive.');
        }

        if (now()->lt($election->start_time) || now()->gt($election->end_time)) {
            return back()->with('error', 'Voting window is closed.');
        }

        try {
            // 3. Atomic Submission Wrapper
            // We use a transaction to ensure both the voter registry and the vote are recorded or neither.
            DB::transaction(function () use ($electionId, $candidateId, $user) {
                // A. THE LOCK: Record that user has voted. 
                // This relies on the UNIQUE constraint in the database.
                // It is the MOST EFFICIENT way to stop double voting under high concurrency.
                $user->votedElections()->attach($electionId);

                // B. THE DEPOSIT: Record the anonymized vote.
                Vote::create([
                    'election_id' => $electionId,
                    'candidate_id' => $candidateId,
                ]);
            });

            // 4. Async Communication (Handled by Queue if available)
            broadcast(new VoteCast($electionId, $candidateId))->toOthers();

            return back()->with('success', 'Vote recorded successfully.');

        } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
            // This catches the exact moment two requests from the same user hit the DB.
            return back()->with('error', 'Integrity Error: Multiple submissions detected.');
        } catch (\Exception $e) {
            return back()->with('error', 'Mission failure: Please try again.');
        }
    }
}
