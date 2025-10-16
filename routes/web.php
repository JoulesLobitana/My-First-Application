<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => \App\Models\Job::with('employer')->paginate(10)
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => JobListing::findOrFail($id)
    ]);
});
