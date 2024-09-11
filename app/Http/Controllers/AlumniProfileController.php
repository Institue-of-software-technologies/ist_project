<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class AlumniProfileController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view profile', only: ['index']),
            new Middleware('permission:view alumni profile',only:['view']),
            new Middleware('permission:delete profile', only: ['destroy']),
            new Middleware('permission:edit profile', only: ['update', 'edit']),
            new Middleware('permission:create profile', only: ['create', 'store']),
        ];
    }

    public function view()
    {
        $loggedInUserId = auth()->id(); // Get the ID of the currently authenticated user
        $profiles = AlumniProfile::where('user_id', '!=', $loggedInUserId)->get(); // Exclude the logged-in user
        return view('profiles.index', compact('profiles'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $profiles = AlumniProfile::where('full_name', 'LIKE', "%{$searchTerm}%")->get();
        return view('profiles.index', compact('profiles'));
    }
    public function index()
    {
        $alumni = Auth::user();
        $profile = AlumniProfile::where('user_id', $alumni->id)->first();

        if (!$profile) {
            return redirect()->route('alumni.profile.create')->with('success', 'Please Create your profile first');
        }
        return view('alumni.profile.view', compact('profile'));
    }

    public function create()
    {
        $alumni = Auth::user();  
    
       
        $name = $alumni->name;
        $last_name = $alumni->last_name;
        $email = $alumni->email;

        return view('alumni.profile.create', [
            'name' => $name,
            'last_name' => $last_name,
            'email' => $email
        ]);
    }
    
    

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'nullable|email|max:30|unique:alumni_profiles',
            'degree' => 'nullable|string',
            'graduation_year' => 'required|integer',
            'extra_course' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gid|max:10048',
            'current_job_title' => 'nullable|string',
            'current_employer' => 'nullable|string',
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'skills' => 'nullable|string',
            'linkedin_profile' => 'nullable|url',
            'social_media_links' => 'nullable|string',
        ]);

        $profile = new AlumniProfile($request->all());
        $profile->user_id = Auth::id();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $profile->profile_photo = $path;
        }
        $profile->save();

        return redirect()->route('alumni.profile.view')->with('success', 'Profile Created Successfully');
    }

    public function edit($id)
    {
        $profile = AlumniProfile::where('user_id', Auth::id())->findOrFail($id);
        return view('alumni.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = AlumniProfile::where('user_id', Auth::id())->findOrFail($id);

        $request->validate
        ([
                'full_name' => 'required',
                'email' => 'nullable|email|max:30|unique:alumni_profiles,email,' . $profile->id,
                'degree' => 'nullable|string',
                'graduation_year' => 'required|integer',
                'extra_course' => 'nullable|string',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
                'current_job_title' => 'nullable|string',
                'current_employer' => 'nullable|string',
                'location' => 'nullable|string',
                'phone' => 'nullable|string',
                'skills' => 'nullable|string',
                'linkedin_profile' => 'nullable|url',
                'social_media_links' => 'nullable|string',
            ]);

        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $profile->profile_photo = $profilePhotoPath;
        }

        $profile->update($request->except('profile_photo'));

        return redirect()->route('alumni.profile.view', $profile->id)->with('success', 'Profile updated Successfully');
    }

}
