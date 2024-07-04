<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{

    public function listApplicant()
    {
        // Fetch all users with the 'alumni' role
        $alumnis = User::role('alumni')->get();
        return view('job-application.list', compact('alumnis'));
    }

    // public function showApplication($id)
    // {
    //     // Fetch the alumni user with their job applications
    //     $alumni = User::role('alumni')->with('jobApplications.job')->findOrFail($id);
    //     return view('job-application.applist', compact('alumni'));
    // }
    public function showApplicationList($id)
    {
        // Fetch the alumni user with their job applications
        $user = User::role('alumni')->with('jobApplications.job')->findOrFail($id);
        $applications = $user->jobApplications;

        return view('job-application.applist', compact('applications', 'user'));
    }

    public function showApplication($applicationId)
    {
        // Fetch the specific job application
        $application = JobApplication::with('job', 'user')->findOrFail($applicationId);

        return view('job-application.application', compact('application'));
    }
    // // public function viewAlumniApplications($applicationId)
    // // {
    // //     // Fetch the alumni user with the 'alumni' role and their projects
    // //     $user = User::role('alumni')->with('jobApplications.job')->findOrFail($applicationId);
    // //     $applications = $user->jobApplications;
        
    // //     return view('job-application.application', compact('applications'));
    // }
    public function index()
    {
        $applications = JobApplication::where('user_id', Auth::id())->get();
        return view('job-application.index', compact('applications'));
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'experience' => 'required|integer|min:1',
                'cover_letter' => 'required|string',
                'cv' => 'required|file|mimes:pdf,doc,docx',
                'gender' => 'required|in:male,female',
                'linkedin' => 'required|url',
                'education' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string',
            ]
        );

        $cvPath = $request->file('cv')->store('cvs', 'public');


        JobApplication::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'experience' => $request->experience,
            'cover_letter' => $request->cover_letter,
            'cv' => $cvPath,
            'gender' => $request->gender,
            'linkedin' => $request->linkedin,
            'education' => $request->education,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('status', 'Aplication submitted successfully');
    }
}
