<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::latest()->get();
        return view('admin.elections.index', compact('elections'));
    }

    public function create()
    {
        return view('admin.elections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:guild_president,faculty_representative',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:draft,active,archived',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Election::create($validated);

        return redirect()->route('admin.elections.index')->with('success', 'Election created successfully.');
    }

    public function show(Election $election)
    {
        $election->load('candidates');
        return view('admin.elections.show', compact('election'));
    }

    public function edit(Election $election)
    {
        return view('admin.elections.edit', compact('election'));
    }

    public function update(Request $request, Election $election)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:guild_president,faculty_representative',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:draft,active,archived',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $election->update($validated);

        return redirect()->route('admin.elections.index')->with('success', 'Election updated successfully.');
    }

    public function destroy(Election $election)
    {
        $election->delete();
        return redirect()->route('admin.elections.index')->with('success', 'Election deleted successfully.');
    }
}
