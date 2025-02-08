<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobListingController extends Controller
{
    public function index()
    {
        // eager loading >>> lazy loading (to avoid n+1 problem)
        $jobs = JobListing::with('employer')->latest()->simplePaginate(25);
    
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(JobListing $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        // validation ...
        request()->validate([
            'title' => ['required', 'min:3'], 
            'salary' => ['required'],
        ]);

        JobListing::create([
            'title' => request('title'), 
            'salary' => request('salary'), 
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    public function edit(JobListing $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(JobListing $job)
    {
        // validate request
        request()->validate([
            'title' => ['required', 'min:3'], 
            'salary' => ['required'],
        ]);

        // authorize the request (on hold..) 

        $job->update([
            'title' => request("title"), 
            'salary' => request('salary'),
        ]);

        // redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(JobListing $job)
    {
        // authorize (on hold...)
    
        // delete the job
        $job->delete();
    
        // redirect
        return redirect('/jobs');
    }
}
