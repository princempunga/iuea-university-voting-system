<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $elections = $this->getElectionStats();
        return view('welcome', compact('elections'));
    }

    public function stats()
    {
        return response()->json($this->getElectionStats());
    }

    private function getElectionStats()
    {
        return Election::whereIn('status', ['active', 'Active', 'ACTIVE'])
            ->with([
                'candidates' => function ($query) {
                    $query->withCount('votes');
                }
            ])
            ->withCount('votes')
            ->get()
            ->groupBy('category')
            ->map(function ($elections) {
                return $elections->map(function ($election) {
                    $totalVotes = $election->votes_count;

                    $candidates = $election->candidates->map(function ($candidate) use ($totalVotes) {
                        return [
                            'id' => $candidate->id,
                            'name' => $candidate->name,
                            'faculty' => $candidate->faculty,
                            'candidate_number' => $candidate->candidate_number,
                            'photo_url' => $candidate->photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($candidate->name),
                            'votes' => $candidate->votes_count,
                            'percentage' => $totalVotes > 0 ? round(($candidate->votes_count / $totalVotes) * 100, 1) : 0,
                        ];
                    });

                    return [
                        'id' => $election->id,
                        'title' => $election->title,
                        'start_time' => $election->start_time ? $election->start_time->toIso8601String() : now()->toIso8601String(),
                        'end_time' => $election->end_time ? $election->end_time->toIso8601String() : now()->addDay()->toIso8601String(),
                        'total_votes' => $totalVotes,
                        'candidates' => $candidates,
                    ];
                });
            });
    }
}