<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'link' => 'required|url',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $screenshotPath = null;
        if ($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('screenshots', 'public');
        }

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->screenshot = $screenshotPath;
        // $project->user_id = auth()->user()->id;
        $project->user_id = auth()->id();
        $project->save();
        return redirect()->route('projects.index')->with('status', 'Project Created Successfully');
    }

    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('project.index', compact('projects'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = Project::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('screenshot')) {
            if ($project->screenshot) {
                Storage::disk('public')->delete($project->screenshot);
            }
            $project->screenshot = $request->file('screenshot')->store('screenshots', 'public');
        }

        // Update the project in the database
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }


    public function destroy($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->delete();
            return redirect()->route('projects.index')->with('status', 'Project deleted successfully');
        }

        return redirect()->route('projects.index')->with('status', 'Project not found.');
    }

}
