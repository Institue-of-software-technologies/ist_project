<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class JobApplicationController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view own applications', only: ['index','show']),
            new Middleware('permission:view applications',only: ['listApplicant']),
        ];
    }
    public function sendEmail($id)
    {
        $application = JobApplication::findOrFail($id);
        $user = $application->user;

        Mail::send('emails.applicationMessage', ['application' => $application], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Regarding Your Job Application');
        });

        return redirect()->back()->with('success', 'Application approved successfully!');
    }

    public function reject($id)
    {
        $application = JobApplication::findOrFail($id);
        $user = $application->user;

        Mail::send('emails.rejectMessage', ['application' => $application], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Regarding Your Job Application');
        });
        return redirect()->back()->with('success', 'Application rejected successfully!');
    }
    public function listApplicant()
    {
        // Fetch all users with the 'alumni' role
        $alumnis = User::role('alumni')->with('alumniProfile')->get();

        // Dynamically calculate the count of unreviewed applications for each alumni
        foreach ($alumnis as $alumni) {
            $alumni->applications_count = $alumni->jobapplications()->where('reviewed', false)->count();
        }

        return view('job-application.list', compact('alumnis'));
    }





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
    public function index()
    {
        // Fetch applications for the authenticated user
        $applications = JobApplication::where('user_id', Auth::id())->get();

        // Pass the applications to the view
        return view('job-application.index', compact('applications'));
    }

    public function show($id)
    {
        // Retrieve the specific application by id
        $application = JobApplication::with('job', 'user')->findOrFail($id);

        return view('job-application.show', compact('application'));
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

        return redirect()->route('alumni.job.index')->with('success', 'Application submitted successfully');
    }
    // public function markAsReviewed($applicationId)
    // {
    //     $application = JobApplication::findOrFail($applicationId);
    //     $application->update(['reviewed' => true]);

    //     return redirect()->back()->with('success', 'Application marked as reviewed.');
    // }
    public function markAsReviewed($applicationId)
    {
        // Find the application and mark it as reviewed
        $application = JobApplication::findOrFail($applicationId);
        $application->update(['reviewed' => true]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application marked as reviewed.');
    }


}
