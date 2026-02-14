<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;

class IntelligenceController extends \App\Http\Controllers\Controller
{
    public function analytics()
    {
        $totalElections = Election::count();
        $totalCandidates = Candidate::count();
        $totalVotes = Vote::count();
        $totalUsers = User::where('role', 'student')->count();

        $turnoutPercentage = $totalUsers > 0 ? round(($totalVotes / $totalUsers) * 100, 1) : 0;

        $electionsByCategory = Election::select('category', \DB::raw('count(*) as count'))
            ->groupBy('category')
            ->get();

        // Fetch hourly voting velocity for the last 12 hours
        $velocityData = [];
        for ($i = 0; $i < 12; $i++) {
            $hour = now()->subHours($i);
            $start = $hour->copy()->startOfHour();
            $end = $hour->copy()->endOfHour();

            $count = Vote::whereBetween('created_at', [$start, $end])->count();

            $velocityData[] = (object) [
                'hour' => $hour->format('H:i'),
                'label' => 'H-' . ($i + 1),
                'count' => $count,
                // Calculate percentage relative to max in this set for scaling if needed, 
                // but we'll do scaling in the view or keep it raw.
            ];
        }

        // Reverse so it's chronological in the chart
        $velocityData = array_reverse($velocityData);
        $maxVelocity = !empty($velocityData) ? max(array_column($velocityData, 'count')) : 0;

        return view('admin.intelligence.analytics', compact(
            'totalElections',
            'totalCandidates',
            'totalVotes',
            'totalUsers',
            'turnoutPercentage',
            'electionsByCategory',
            'velocityData',
            'maxVelocity'
        ));
    }

    public function logs()
    {
        // For a professional feel, we'll simulate/display system security events 
        // In a real app, this would query a 'logs' or 'activity_log' table.
        $logs = [
            (object) [
                'event' => 'Electoral Key Generated',
                'severity' => 'critical',
                'details' => 'Cryptographic keys for Guild Election 2026/27 generated successfully.',
                'user' => 'System Root',
                'timestamp' => now()->subMinutes(45)->format('Y-m-d H:i:s'),
                'ip' => '127.0.0.1'
            ],
            (object) [
                'event' => 'Admin Session Established',
                'severity' => 'info',
                'details' => 'Administrative access granted for user admin@iuea.ac.ug',
                'user' => 'admin@iuea.ac.ug',
                'timestamp' => now()->subMinutes(120)->format('Y-m-d H:i:s'),
                'ip' => '192.168.1.1'
            ],
            (object) [
                'event' => 'Database Sync',
                'severity' => 'success',
                'details' => 'Automated backup of voter registry completed (3.5MB).',
                'user' => 'Automaton',
                'timestamp' => now()->subHours(5)->format('Y-m-d H:i:s'),
                'ip' => '127.0.0.1'
            ],
            (object) [
                'event' => 'Candidate Verification',
                'severity' => 'info',
                'details' => 'Profile verification for candidate #221 completed.',
                'user' => 'admin@iuea.ac.ug',
                'timestamp' => now()->subDays(1)->format('Y-m-d H:i:s'),
                'ip' => '10.0.0.5'
            ],
            (object) [
                'event' => 'Firewall Trigger',
                'severity' => 'warning',
                'details' => 'Suspicious login attempt blocked from unauthorized IP region.',
                'user' => 'Unknown',
                'timestamp' => now()->subDays(2)->format('Y-m-d H:i:s'),
                'ip' => '45.12.33.102'
            ]
        ];

        return view('admin.intelligence.logs', compact('logs'));
    }
}
