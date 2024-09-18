<?php
namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    // Display a listing of the tools
    public function index()
    {
        $tools = Tool::all();
        return view('tools.index', compact('tools'));
    }

    // Show the form for creating a new tool
    public function create()
    {
        return view('tools.create');
    }

    // Store a newly created tool in storage
    public function store(Request $request)
    {
        $request->validate([
            'tool_name' => 'required',
        ]);

        Tool::create($request->all());

        return redirect()->route('tools.index')
                         ->with('success', 'Tool created successfully.');
    }

    // Display the specified tool
    public function show(Tool $tool)
    {
        return view('tools.show', compact('tool'));
    }

    // Show the form for editing the specified tool
    public function edit(Tool $tool)
    {
        return view('tools.edit', compact('tool'));
    }

    // Update the specified tool in storage
    public function update(Request $request, Tool $tool)
    {
        $request->validate([
            'tool_name' => 'required',
        ]);

        $tool->update($request->all());

        return redirect()->route('tools.index')
                         ->with('success', 'Tool updated successfully.');
    }

    // Remove the specified tool from storage
    public function destroy(Tool $tool)
    {
        $tool->delete();

        return redirect()->route('tools.index')
                         ->with('success', 'Tool deleted successfully.');
    }
}
