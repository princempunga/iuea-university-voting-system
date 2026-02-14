<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Election;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::where('status', 'active')
            ->where('is_active', true)
            ->where('start_time', '<=', now())
            ->where('end_time', '>', now())
            ->latest()
            ->get();

        return view('student.elections.index', compact('elections'));
    }

    public function show(Election $election)
    {
        if (!$election->is_active || $election->status !== 'active') {
            abort(404);
        }

        $election->load('candidates');
        return view('student.elections.show', compact('election'));
    }
}
