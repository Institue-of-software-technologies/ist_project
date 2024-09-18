<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use App\Models\ProjectTools;
use Database\Seeders\skills;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use App\Models\ProjectSkills;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProjectController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view project', only: ['index']),
            new Middleware('permission:view alumni projects', only: ['viewAlumniProjects', 'showProject']),
            new Middleware('permission:delete project', only: ['destroy']),
            new Middleware('permission:edit project', only: ['update', 'edit']),
            new Middleware('permission:publish project', only: ['create', 'store']),
        ];
    }

    public function viewAlumniProjects($alumni)
    {
        // Find the alumni user by their ID and only load public projects
        $alumni = User::role('alumni')->with([
            'projects' => function ($query) {
                $query->where('visibility', 'public');
            }
        ])->findOrFail($alumni);

        return view('alumni.projects.index', compact('alumni'));
    }

    public function index()
    {
        // Fetch projects associated with the currently authenticated user
        $projects = Project::where('user_id', Auth::id())->get();


        if (!$projects) {
            return redirect()->route('project.create')->with('success', 'Please Create your profile first');
        }
        
        return view('project.index', compact('projects'));
    }


    public function create()
    {
        $user = Auth::id();
        $tools = Tool::all();
        $skills= Skill::all();
        $userProfile = AlumniProfile::where('user_id', $user)->first();
        return view('project.create', compact(['userProfile','tools','skills']));
    }


    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'problem_statement' => 'required|string',
            'solution_proposed' => 'required|string',
            'description' => 'required|string',
            'flowchart_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf,sql,svg',
            'database_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf,svg',
            'powerpoint' => 'nullable|file|mimes:ppt,pptx',
            'demo_url' => 'required|url',
            'video_url' => 'nullable|url',
            'github_repository' => 'required|url',
            'visibility' => 'required|in:public,private',
            'documentation' => 'required|mimes:pdf,doc,docx,txt|max:2048',
            'screenshots.*' => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048', 
            //tools used 
            'tools_used'=>'nullable|array',
            //skills used 
            'skills_used'=>'required|array',

        ]);

        // dd($data);
        if ($request->hasFile('flowchart_diagram')) {
            $data['flowchart_diagram'] = $request->file('flowchart_diagram')->store('flowchart_diagrams', 'public');
        }
        else{
            $data['flowchart_diagram'] ="null";
        }

        if ($request->hasFile('database_diagram')) {
            $data['database_diagram'] = $request->file('database_diagram')->store('database_diagrams', 'public');
        }
        else{
            $data['database_diagram'] ="null";
        }
        if ($request->hasFile('powerpoint')) {
            $data['powerpoint'] = $request->file('powerpoint')->store('powerpoints', 'public');
        }
        // Handle file upload
        if ($request->hasFile('documentation')) {
            $data['documentation'] = $request->file('documentation')->store('documentation', 'public');
        }
    
        $project = new Project([
            'title' => $data['title'],
            'problem_statement' => $data['problem_statement'],
            'solution_proposed' => $data['solution_proposed'],
            'flowchart_diagram' => $data['flowchart_diagram'],
            'database_diagram' => $data['database_diagram'],
            'powerpoint' => $data['powerpoint'],
            'demo_url' => $data['demo_url'],
            'video_url' => $data['video_url'],
            'github_repository' => $data['github_repository'],
            'visibility' => $data['visibility'],
            'documentation' => $data['documentation'],
            'description' => $data['description'],
        ]);
        $project->user_id = auth()->id(); // Set any additional attributes
        $project->save();

        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $file) {
                $screenshotPath = $file->store('screenshots', 'public');

                DB::table('project_screen_shots')->insert([
                    'project_id' => $project->id,
                    'screen_shot_path' => $screenshotPath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if (!empty($data['skills_used'])) {
            foreach ($request->input('skills_used') as $skillId) {
                DB::table('project_skills')->insert([
                    'project_id' => $project->id,
                    'skill_id' => $skillId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
        // Handle tools_used (assuming it's an array of tool IDs, not files)
        if (!empty($data['tools_used'])) {
            foreach ($request->input('tools_used') as $toolId) {
                DB::table('project_tools')->insert([
                    'project_id' => $project->id,
                    'tool_id' => $toolId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    
        return redirect()->route('projects.index')->with('success', 'Project Created Successfully');
    }
    

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'problem_statement' => 'required|string',
            'solution_proposed' => 'required|string',
            'description' => 'required|string',
            'flowchart_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf,sql,svg',
            'database_diagram' => 'nullable|file|mimes:jpg,jpeg,png,pdf,svg',
            'powerpoint' => 'nullable|file|mimes:ppt,pptx',
            'demo_url' => 'required|url',
            'video_url' => 'nullable|url',
            'tools_used' => 'required|string|max:255',
            'programming_language' => 'required|string|max:255',
            'github_repository' => 'required|url',
            'visibility' => 'required|in:public,private',
            'documentation' => 'required|mimes:pdf,doc,docx,txt|max:2048',
            'screenshots.*' => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $project = Project::findOrFail($id);

        if ($request->hasFile('flowchart_diagram')) {
            $data['flowchart_diagram'] = $request->file('flowchart_diagram')->store('flowchart_diagrams', 'public');
        }
        if ($request->hasFile('database_diagram')) {
            $data['database_diagram'] = $request->file('database_diagram')->store('database_diagrams', 'public');
        }
        if ($request->hasFile('powerpoint')) {
            $data['powerpoint'] = $request->file('powerpoint')->store('powerpoints', 'public');
        }

        // Handle multiple screenshots
        if ($request->hasFile('screenshots')) {
            $screenshots = [];
            foreach ($request->file('screenshots') as $file) {
                $screenshots[] = $file->store('screenshots', 'public');
            }
            // Store screenshots in the database as a JSON array (optional, if needed)
            $data['screenshots'] = json_encode($screenshots);
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->delete();
            return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
        }

        return redirect()->route('projects.index')->with('success', 'Project not found.');
    }
}
