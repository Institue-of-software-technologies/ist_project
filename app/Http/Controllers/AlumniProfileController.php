<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use Illuminate\Support\Facades\Auth;


class AlumniProfileController extends Controller
{
        public function index()
        {
            $alumni = Auth::user();
            $profile = AlumniProfile::where('user_id', $alumni->id)->first();

            if(!$profile)
            {
                return redirect()->route('alumni.profile.create')->with('status','Please Create your profile first');
            }
            return view('alumni.profile.index', compact('profile'));
        }

        public function create()
        {
            return view('alumni.profile.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'full_name' => 'required',
                'email' => 'nullable|email|max:20|unique:alumni_profiles',
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

            if($request->hasFile('profile_photo'))
            {
                $path=$request->file('profile_photo')->store('profile_photos','public');
                $profile->profile_photo = $path;
            }
            $profile->save();

            return redirect()->route('alumni.profile.index')->with('status', 'Profile Created Successfully');
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
        'email' => 'nullable|email|max:255|unique:alumni_profiles,email,' . $profile->id,
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

        return redirect()->route('alumni.profile.index', $profile->id)->with('status', 'Profile updated Successfully');
        }

}
