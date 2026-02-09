<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
// Kita pakai Full Path di bawah biar tidak bentrok nama Controller

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES (Frontend)
|--------------------------------------------------------------------------
*/

// Halaman Home (Portfolio)
Route::get('/', function () {
    $certificates = \App\Models\Certificate::orderBy('is_pinned', 'desc')->orderBy('issued_year', 'desc')->get();
    $projects = \App\Models\Project::latest()->get();
    $tech_experiences = \App\Models\Experience::where('type', 'tech')->latest()->get();
    $prof_experiences = \App\Models\Experience::where('type', 'professional')->latest()->get();

    return view('frontend.home', compact('certificates', 'projects', 'tech_experiences', 'prof_experiences'));
})->name('home');

// Kirim Pesan (Contact Form Public)
Route::post('/contact/send', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.send');

// Download CV Logic
Route::get('/download-cv', function () {
    $resume = \App\Models\Resume::where('is_active', true)->first();

    if (!$resume) {
        return back()->with('error', 'CV not available at the moment.');
    }

    // Tracking Download
    \App\Models\ResumeDownload::create([
        'resume_id' => $resume->id,
        'ip_address' => request()->ip(),
        'user_agent' => request()->header('User-Agent'),
    ]);

    return Storage::disk('public')->download($resume->file_path, $resume->name . '.pdf');
})->name('cv.download');

// Monkeytype Stats API
Route::get('/monkeytype-stats', function () {
    $token = config('services.monkeytype.key');

    if (!$token) {
        return response()->json(['error' => 'Monkeytype API key not set'], 500);
    }

    try {
        $headers = ['Authorization' => 'Bearer ' . $token];
        $pbResponse = Http::withHeaders($headers)->timeout(10)->get('https://api.monkeytype.com/users/personalBests?mode=time');
        $statsResponse = Http::withHeaders($headers)->timeout(10)->get('https://api.monkeytype.com/users/stats');

        if ($pbResponse->failed() || $statsResponse->failed()) {
            return response()->json(['error' => 'Monkeytype API failed'], 502);
        }

        return response()->json([
            'pbs' => $pbResponse->json('data') ?? [],
            'stats' => $statsResponse->json('data') ?? []
        ]);
    } catch (\Throwable $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});


/*
|--------------------------------------------------------------------------
| 2. AUTHENTICATION (Login/Logout)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| 3. ADMIN PANEL (Protected Routes)
|--------------------------------------------------------------------------
*/
// Semua route di dalam sini WAJIB Login
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // --- Dashboard & Statistik ---
    Route::get('/dashboard', function () {
        $totalProjects = \App\Models\Project::count();
        $totalCertificates = \App\Models\Certificate::count();
        $totalExperiences = \App\Models\Experience::count();
        $totalDownloads = \App\Models\ResumeDownload::count();

        return view('admin.dashboard', compact(
            'totalProjects', 'totalCertificates', 'totalExperiences', 'totalDownloads'
        ));
    })->name('dashboard');

    // --- Fitur Ganti Password ---
    Route::put('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');

    // --- CRUD Resources ---
    Route::resource('certificates', \App\Http\Controllers\Admin\CertificateController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('experiences', \App\Http\Controllers\Admin\ExperienceController::class);
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);

    // Inbox Pesan (Admin View Only)
    Route::resource('messages', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'destroy']);

    // Resume Manager
    Route::resource('resumes', \App\Http\Controllers\Admin\ResumeController::class)->only(['index', 'store', 'destroy']);
    Route::post('/resumes/{id}/activate', [\App\Http\Controllers\Admin\ResumeController::class, 'activate'])->name('resumes.activate');
    Route::get('/resumes/{id}/logs', [\App\Http\Controllers\Admin\ResumeController::class, 'logs'])->name('resumes.logs');
});
