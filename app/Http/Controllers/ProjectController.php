<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProjectController extends Controller implements HasMiddleware
{

        public static function middleware(): array
        {
        return [
        new Middleware('permission:view project', only: ['index']),
        new Middleware('permission:delete project', only: ['destroy']),
        new Middleware('permission:edit project', only: ['update', 'edit']),
        new Middleware('permission:publish project', only: ['create', 'store']),
        ];
        }
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('project.index', compact('projects'));
    }
    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'problem_statement' => 'required|string',
            'solution_proposed' => 'required|string',
            'description' => 'required|string',
            'flowchart_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf,sql',
            'database_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'powerpoint' => 'nullable|file|mimes:ppt,pptx',
            'demo_url' => 'required|url',
            'video_url' => 'nullable|file|mimes:mp4,mpeg',
            'tools_used' => 'required|string|max:255',
            'programming_language' => 'required|string|max:255',
            'github_repository' => 'required|url',
            'visibility' => 'required|in:public,private',
        ]);

        if ($request->hasFile('flowchart_diagram')) {
            $data['flowchart_diagram'] = $request->file('flowchart_diagram')->store('flowchart_diagrams', 'public');
        }
        if ($request->hasFile('database_diagram')) {
            $data['database_diagram'] = $request->file('database_diagram')->store('database_diagrams', 'public');
        }
        if ($request->hasFile('powerpoint')) {
            $data['powerpoint'] = $request->file('powerpoint')->store('powerpoints', 'public');
        }
        if ($request->hasFile('video_url')) {
            $data['video_url'] = $request->file('video_url')->store('videos', 'public');
        }

        $project = new Project($data);
        $project->user_id = auth()->id();
        $project->save();

        return redirect()->route('projects.index')->with('status', 'Project Created Successfully');
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'problem_statement' => 'required|string',
            'solution_proposed' => 'required|string',
            'description' => 'required|string',
            'flowchart_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf,sql',
            'database_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'powerpoint' => 'nullable|file|mimes:ppt,pptx',
            'demo_url' => 'required|url',
            'video_url' => 'nullable|file|mimes:mp4,mpeg',
            'tools_used' => 'required|string|max:255',
            'programming_language' => 'required|string|max:255',
            'github_repository' => 'required|url',
            'visibility' => 'required|in:public,private',
        ]);

        $project = Project::findOrFail($id);


        // Handle file upload

        if ($request->hasFile('flowchart_diagram')) {
            $data['flowchart_diagram'] = $request->file('flowchart_diagram')->store('flowchart_diagrams', 'public');
        }
        if ($request->hasFile('database_diagram')) {
            $data['database_diagram'] = $request->file('database_diagram')->store('database_diagrams', 'public');
        }
        if ($request->hasFile('powerpoint')) {
            $data['powerpoint'] = $request->file('powerpoint')->store('powerpoints', 'public');
        }
        if ($request->hasFile('video_url')) {
            if ($project->video_url) {
                Storage::delete($project->video_url);
            }
            $data['video_url'] = $request->file('video_url')->store('videos', 'public');
        }


        // Update the project in the database
        $project->update($data);
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }


    public function destroy($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->delete();
            return redirect()->route('project.index')->with('status', 'Project deleted successfully');
        }

        return redirect()->route('project.index')->with('status', 'Project not found.');
    }

}
