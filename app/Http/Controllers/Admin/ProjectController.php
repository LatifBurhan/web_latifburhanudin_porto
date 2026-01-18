<?php

namespace App\Http\Controllers\Admin; // <--- HANYA INI NAMESPACE YANG BENAR

use App\Http\Controllers\Controller;
use App\Models\Project; // <--- Kita panggil Modelnya di sini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        // Upload Image
        $imagePath = $request->file('image')->store('projects', 'public');

        // Convert Input "Laravel, MySQL" menjadi Array ["Laravel", "MySQL"]
        $techStack = $request->tech_stack ? array_map('trim', explode(',', $request->tech_stack)) : [];

        Project::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
            'description' => $request->description,
            'tech_stack' => $techStack, // Simpan sbg Array
            'link_demo' => $request->link_demo,
            'link_github' => $request->link_github,
            'link_figma' => $request->link_figma,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate(['title' => 'required']);

        $data = $request->except(['image', 'tech_stack']);

        // Handle Image Update
        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle Tech Stack Update
        if ($request->has('tech_stack')) {
            $data['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Project deleted!');
    }
}
