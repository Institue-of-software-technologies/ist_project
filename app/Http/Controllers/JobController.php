<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class JobController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view job', only: ['index']),
            new Middleware('permission:view alumni job', only: ['view']),
            new Middleware('permission:delete job', only: ['destroy']),
            new Middleware('permission:edit job', only: ['update', 'edit']),
            new Middleware('permission:create job', only: ['create', 'store']),
        ];
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('role-permission.job.show', compact('job'));
    }
    public function view($id)
    {
        $job = Job::findOrFail($id);
        return view('alumni.job.viewjob', compact('job'));
    }

    public function index()
    {
        $jobs = Job::all();
        $trashedJobs = Job::onlyTrashed()->get();
        return view('role-permission.job.index', compact('jobs', 'trashedJobs'));
    }

    public function create()
    {
        return view('role-permission.job.create');
    }

    public function alumniIndex()
    {
        $jobs = Job::all();
        return view('alumni.job.index', compact('jobs'));
    }

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

    public function edit(Job $job)
    {
        return view('role-permission.job.edit', compact('job'));
    }

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

    public function restore($id)
    {
        $job = Job::withTrashed()->find($id);

        if ($job) {
            $job->restore();
            return redirect()->route('role-permission.job.index')->with('status', 'Job restored successfully.');
        }

        return redirect()->route('role-permission.job.index')->with('status', 'Job not found.');
    }

    public function destroy($jobId)
    {
        $job = Job::find($jobId);
        if ($job) {
            $job->delete();
            return redirect()->route('role-permission.job.index')->with('status', 'Job Deleted Successfully');
        }

        return redirect()->route('role-permission.job.index')->with('status', 'Job not found.');
    }
}
