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
        // Optimized with eager-loading and counts to eliminate N+1 queries
        return Election::where('is_active', true)
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
                        $voteCount = $candidate->votes_count;
                        return [
                            'id' => $candidate->id,
                            'name' => $candidate->name,
                            'faculty' => $candidate->faculty,
                            'candidate_number' => $candidate->candidate_number,
                            'photo_url' => $candidate->photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($candidate->name) .
                                '&size=200&color=7F9CF5&background=EBF4FF',
                            'votes' => $voteCount,
                            'percentage' => $totalVotes > 0 ? round(($voteCount / $totalVotes) * 100, 1) : 0,
                        ];
                    });

                    return [
                        'id' => $election->id,
                        'title' => $election->title,
                        'total_votes' => $totalVotes,
                        'candidates' => $candidates,
                    ];
                });
            });
    }
}