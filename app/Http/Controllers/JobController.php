<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Notifications\JobPostedNotification;
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
            new Middleware('permission:restore job',only: ['index'])
        ];
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('find');
        $jobs = Job::where('title', 'LIKE', "%{$searchTerm}%")->get();
        return view('role-permission.job.index', compact('jobs'));
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
        $jobs = Job::orderBy('created_at', 'desc')->get();
        $trashedJobs = Job::onlyTrashed()->get();
        return view('role-permission.job.index', compact('jobs', 'trashedJobs'));
    }

    public function create()
    {
        return view('role-permission.job.create');
    }

    public function alumniIndex()
    {
        // $jobs = Job::all();
        $jobs = Job::orderBy('created_at', 'desc')->get();
        return view('alumni.job.index', compact('jobs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'numeric',
            'company_name' => 'required',
            'job_type' => 'required|in:full-time,part-time,contract',
            'experience_level' => 'required',
            'education_level' => 'required',
            'skills' => 'required',
            'company_logo' => 'nullable|file|mimes:jpg,jpeg,png,avif',
        ]);

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('company_logo', 'public');
        }


        $job = new Job($data);
        $job->user_id = auth()->id();
        $job->save();
        $alumni = User::role('alumni')->get();

        foreach ($alumni as $alumnus) {
            $alumnus->notify(new JobPostedNotification($job));
        }

        return redirect()->route('role-permission.job.index')->with('status', 'Job Created Successfully');
    }

    public function edit(Job $job)
    {
        return view('role-permission.job.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric',
            'company_name' => 'required',
            'job_type' => 'required|in:full-time,part-time,contract',
            'experience_level' => 'required',
            'education_level' => 'required',
            'skills' => 'required',
            'company_logo' => 'nullable|file|mimes:jpg,jpeg,png,avif',
        ]);

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('company_logo', 'public');
        }

        $job->update($data);

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
