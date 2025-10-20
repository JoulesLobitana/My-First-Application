<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Display all job listings
    public function index()
    {
        $jobs = JobListing::with('employer')->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    // Show create job form
    public function create()
    {
        return view('jobs.create');
    }

    // Store new job
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required',
            'employer_id' => 'required|exists:employers,id',
        ]);

        JobListing::create($validated);

        return redirect()->route('jobs.index')->with('message', 'Job created successfully!');
    }

    // Show a single job
    public function show(JobListing $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Show edit form
    public function edit(JobListing $job)
    {
        return view('jobs.edit', compact('job'));
    }

    // Update job
    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required',
            'employer_id' => 'required|exists:employers,id',
        ]);

        $job->update($validated);

        return redirect()->route('jobs.index')->with('message', 'Job updated successfully!');
    }

    // Delete job
    public function destroy(JobListing $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('message', 'Job deleted successfully!');
    }
}
