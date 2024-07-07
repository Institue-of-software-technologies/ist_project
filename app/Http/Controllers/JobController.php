<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Support\Facades\Auth;
use App\Notifications\JobPostedNotification;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
            new Middleware('permission:restore job', only: ['index'])
        ];
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('find');
        $jobs = Job::where('title', 'LIKE', "%{$searchTerm}%")->get();
        return view('role-permission.job.index', compact('jobs'));
    }

    public function Alumnisearch(Request $request)
    {
        $searchTerm = $request->input('lookup');
        $jobs = Job::where('title', 'LIKE', "%{$searchTerm}%")->get();
        return view('alumni.job.index', compact('jobs'));
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
        $user = Auth::user();
        $profile = AlumniProfile::where('user_id', $user->id)->first();

        $skills = explode(',', $profile->skills);
        $jobs = Job::where(function ($query) use ($skills) {
            foreach ($skills as $skill) {
                $query->orWhere('skills', 'LIKE', "%{$skill}%");
            }
        })->get();

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

        // Notify alumni with matching skills
        $this->notifyMatchingAlumni($job);

        return redirect()->route('role-permission.job.index')->with('status', 'Job Created Successfully');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('role-permission.job.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

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
        } else {
            $data['company_logo'] = $job->company_logo; // Keep the existing logo if not updated
        }

        $job->update($data);

        return redirect()->route('role-permission.job.index')->with('status', 'Job Updated Successfully');
    }

    private function notifyMatchingAlumni(Job $job)
    {
        $jobSkills = explode(',', $job->skills);

        $alumni = User::role('alumni')->get()->filter(function ($alumnus) use ($jobSkills) {
            $profile = $alumnus->alumniProfile;

            if ($profile) {
                $alumniSkills = explode(',', $profile->skills);
                return !empty(array_intersect($jobSkills, $alumniSkills));
            }

            return false;
        });

        // Log the number of alumni found
        Log::info('Number of alumni found with matching skills: ' . $alumni->count());

        // Send notifications to matching alumni
        foreach ($alumni as $alumnus) {
            Log::info('Notifying alumnus: ' . $alumnus->email);
            $alumnus->notify(new JobPostedNotification($job));
        }
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
