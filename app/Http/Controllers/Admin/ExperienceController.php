<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        // Ambil data terbaru
        $experiences = Experience::latest()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'role' => 'required',
            'company' => 'required',
            'period' => 'required',
            'description' => 'required',
        ]);

        $techStack = $request->tech_stack ? array_map('trim', explode(',', $request->tech_stack)) : [];

        Experience::create([
            'type' => $request->type,
            'role' => $request->role,
            'company' => $request->company,
            'period' => $request->period,
            'description' => $request->description,
            'tech_stack' => $techStack,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience added!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate(['role' => 'required']);

        $techStack = $request->tech_stack ? array_map('trim', explode(',', $request->tech_stack)) : [];

        $experience->update([
            'type' => $request->type,
            'role' => $request->role,
            'company' => $request->company,
            'period' => $request->period,
            'description' => $request->description,
            'tech_stack' => $techStack,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
