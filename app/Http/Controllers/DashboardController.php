<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the administrative command center or student voting booth.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $stats = [
                'totalStudents' => User::where('role', 'student')->count(),
                'totalVotes' => Vote::count(),
                'totalElections' => Election::count(),
                'totalCandidates' => Candidate::count(),
            ];

            return view('dashboard', $stats);
        }

        // For student view
        return view('dashboard');
    }
}
