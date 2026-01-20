<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\ResumeDownload;
use App\Models\Skill; // <--- PASTIKAN ADA INI DI ATAS

class HomeController extends Controller
{
    public function index()
    {
        // 1. DATA LAINNYA
        $certificates = Certificate::orderBy('is_pinned', 'desc')->orderBy('issued_year', 'desc')->get();
        $projects = Project::latest()->get();
        $tech_experiences = Experience::where('type', 'tech')->latest()->get();
        $prof_experiences = Experience::where('type', 'professional')->latest()->get();

        // 2. DATA STATISTIK
        $totalProjects = Project::count();
        $totalCertificates = Certificate::count();
        $totalExperiences = Experience::count();
        $totalDownloads = ResumeDownload::count();

        // ==========================================
        // BARIS PENTING YANG HILANG DI KODINGAN ABANG:
        // ==========================================
        $skills = Skill::all();
        // ==========================================

        // 3. RETURN VIEW
        return view('frontend.home', compact(
            'certificates',
            'projects',
            'tech_experiences',
            'prof_experiences',
            'totalProjects',
            'totalCertificates',
            'totalExperiences',
            'totalDownloads',
            'skills' // <--- Variable ini butuh baris '$skills = ...' di atas tadi
        ));
    }
}
