<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\ResumeDownload;

class HomeController extends Controller
{
    /**
     * Show the main portfolio page.
     */
    public function index()
    {
        // 1. DATA LIST (Untuk ditampilkan looping)
        $certificates = Certificate::orderBy('is_pinned', 'desc')
                                   ->orderBy('issued_year', 'desc')
                                   ->get();

        $projects = Project::latest()->get();

        $tech_experiences = Experience::where('type', 'tech')->latest()->get();

        $prof_experiences = Experience::where('type', 'professional')->latest()->get();

        // 2. DATA STATISTIK (Untuk Counter Dashboard Frontend)
        $totalProjects = Project::count();
        $totalCertificates = Certificate::count();
        $totalExperiences = Experience::count();
        $totalDownloads = ResumeDownload::count();

        // 3. KIRIM KE VIEW
        return view('frontend.home', compact(
            'certificates',
            'projects',
            'tech_experiences',
            'prof_experiences',
            'totalProjects',
            'totalCertificates',
            'totalExperiences',
            'totalDownloads'
        ));
    }
}
