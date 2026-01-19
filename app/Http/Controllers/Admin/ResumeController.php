<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        // Ambil CV beserta jumlah download-nya
        $resumes = Resume::withCount('downloads')->latest()->get();
        return view('admin.resumes.index', compact('resumes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf|max:2048', // Max 2MB
        ]);

        $path = $request->file('file')->store('resumes', 'public');

        // Jika ini CV pertama, otomatis jadikan aktif
        $isActive = Resume::count() === 0 ? true : false;

        Resume::create([
            'name' => $request->name,
            'file_path' => $path,
            'is_active' => $isActive
        ]);

        return back()->with('success', 'CV uploaded successfully!');
    }

    public function activate($id)
    {
        // Set semua jadi tidak aktif dulu
        Resume::query()->update(['is_active' => false]);

        // Set yang dipilih jadi aktif
        $resume = Resume::findOrFail($id);
        $resume->update(['is_active' => true]);

        return back()->with('success', 'Active CV updated!');
    }

    public function destroy(Resume $resume)
    {
        if ($resume->file_path) {
            Storage::disk('public')->delete($resume->file_path);
        }
        $resume->delete();
        return back()->with('success', 'CV deleted!');
    }

    // Fitur melihat log download
    public function logs($id)
    {
        $resume = Resume::with('downloads')->findOrFail($id);
        return view('admin.resumes.logs', compact('resume'));
    }
}
