<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;

class JobController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
    return [
    new Middleware('permission:view job', only:['index']),
    new Middleware('permission:delete job', only:['destroy']),
    new Middleware('permission:edit job', only:['update', 'edit']),
    new Middleware('permission:create job', only:['create','store']),
    ];
    }


    public function index()
    {
        $jobs = Job::get();
        return view('role-permission.job.index' , compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permission.job.create');
    }

    public function alumniIndex()
    {
        $jobs = Job::all();

        return view('alumni.job.index', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'numeric',
            'company_name' => 'required',
            'job_type' => 'required|in:full-time,part-time,contract',
            'experience_level' => 'required',
            'education_level' => 'required',                      
            'skills' => 'required',
        ]);

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'company_name' => $request->company_name,
            'job_type' => $request->job_type,
            'experience_level' => $request->experience_level,
            'education_level' => $request->education_level,
            'skills' => $request->skills,
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->route('role-permission.job.index')->with('status', 'Job Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('role-permission.job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric',
            'company_name' => 'required',
            'job_type' => 'required|in:full-time,part-time,contract',
            'experience_level' => 'required',
            'education_level' => 'required',
            'skills' => 'required',
        ]);

        $job->update($request->all());

        return redirect()->route('role-permission.job.index')->with('status', 'Job Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jobId)
    {
        $job = Job::find($jobId);
        $job->delete();
        return redirect()->route('role-permission.job.index')->with('status', 'Job Deleted Successfully');
    }
}
