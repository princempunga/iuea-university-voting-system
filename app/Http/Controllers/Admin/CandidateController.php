<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with('election')->get();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $elections = Election::all();
        $faculties = [
            'Faculty of Science and Technology',
            'Faculty of Business & Management',
            'Faculty of Engineering',
            'Faculty of Law',
            'International Foundation Programme'
        ];
        return view('admin.candidates.create', compact('elections', 'faculties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'election_id' => 'required|exists:elections,id',
            'name' => 'required|string|max:255',
            'faculty' => 'required|string|in:Faculty of Science and Technology,Faculty of Business & Management,Faculty of Engineering,Faculty of Law,International Foundation Programme',
            'candidate_number' => 'required|string|max:50',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('candidates', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        Candidate::create($validated);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate added successfully.');
    }

    public function edit(Candidate $candidate)
    {
        $elections = Election::all();
        $faculties = [
            'Faculty of Science and Technology',
            'Faculty of Business & Management',
            'Faculty of Engineering',
            'Faculty of Law',
            'International Foundation Programme'
        ];
        return view('admin.candidates.edit', compact('candidate', 'elections', 'faculties'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'election_id' => 'required|exists:elections,id',
            'name' => 'required|string|max:255',
            'faculty' => 'required|string|in:Faculty of Science and Technology,Faculty of Business & Management,Faculty of Engineering,Faculty of Law,International Foundation Programme',
            'candidate_number' => 'required|string|max:50',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($candidate->photo_url) {
                $oldPath = str_replace('/storage/', '', $candidate->photo_url);
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('photo')->store('candidates', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        $candidate->update($validated);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate removed successfully.');
    }
}