<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function show(Election $election)
    {
        $election->load([
            'candidates' => function ($query) {
                $query->withCount('votes');
            }
        ]);

        $totalVotes = $election->votes()->count();

        return view('admin.results.show', compact('election', 'totalVotes'));
    }
}
