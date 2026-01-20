<?php
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Resume;
use App\Models\ResumeDownload;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\ContactController as AdminContactController; // <--- Dikasih nama baru



// --- 1. FRONTEND (PUBLIK) ---
Route::get('/', function () {
    $certificates = Certificate::orderBy('is_pinned', 'desc')
                               ->orderBy('issued_year', 'desc')
                               ->get();
    $projects = Project::latest()->get();
    $tech_experiences = Experience::where('type', 'tech')->latest()->get();
    $prof_experiences = Experience::where('type', 'professional')->latest()->get();


    return view('frontend.home', compact('certificates', 'projects','tech_experiences','prof_experiences'));
})->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');
//api token monkeytype
//Njk2Y2UxM2Q0MjhiNjk2MTlhY2UxMTNmLkd5d1RRZURUNnNIQ0ZuSFU2aHdrVlNORHlHMXdDQVEx
Route::prefix('api')->group(function () {

    Route::get('/monkeytype-stats', function () {
        // AMBIL DARI CONFIG DULU, BARU ENV SEBAGAI CADANGAN
        // Pastikan di hosting kamu Environment Variable 'API_MONKEYTYPE' sudah diisi!
        $token = config('services.monkeytype.key', env('API_MONKEYTYPE'));

        if (empty($token)) {
            // Debugging: Cek apakah token terbaca null
            return response()->json(['error' => 'API Key Server configuration missing (Token is null)'], 500);
        }

        try {
            $headers = ['Authorization' => 'ApeKey ' . $token];

            // Request PB
            $pbResponse = Http::withHeaders($headers)
                ->timeout(10) // Tambah timeout jadi 10s utk production
                ->get('https://api.monkeytype.com/users/personalBests?mode=time');

            // Request Stats
            $statsResponse = Http::withHeaders($headers)
                ->timeout(10)
                ->get('https://api.monkeytype.com/users/stats');

            if ($pbResponse->failed() || $statsResponse->failed()) {
                // Return body error dari MonkeyType untuk debugging
                return response()->json([
                    'error' => 'Gagal koneksi ke MonkeyType',
                    'mt_error_pb' => $pbResponse->body(),
                    'mt_error_stats' => $statsResponse->body()
                ], 502);
            }

            return response()->json([
                'pbs' => $pbResponse->json()['data'] ?? [],
                'stats' => $statsResponse->json()['data'] ?? []
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error: ' . $e->getMessage()], 500);
        }
    });

});



// --- 2. AUTHENTICATION (MANUAL) ---

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


// --- 3. REDIRECT /DASHBOARD ---
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
});


// --- 4. ADMIN PANEL (DILINDUNGI PASSWORD) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD Sertifikat
    Route::resource('certificates', CertificateController::class);

    // CRUD Project
    Route::resource('projects', ProjectController::class);
    // CRUD Experience
    Route::resource('experiences', ExperienceController::class);
    //CRUD Skill
    Route::resource('skills', SkillController::class);
    //Routes massages
    Route::resource('messages', ContactController::class)->only(['index', 'destroy']);

    Route::get('/dashboard', function () {
        // Ambil Data Statistik Real-time
        $totalProjects = Project::count();
        $totalCertificates = Certificate::count();
        $totalExperiences = Experience::count();
        $totalDownloads = ResumeDownload::count(); // Hitung total download CV

        // Kirim ke View
        return view('admin.dashboard', compact(
            'totalProjects',
            'totalCertificates',
            'totalExperiences',
            'totalDownloads'
        ));
    })->name('dashboard');
});


//download cv

Route::get('/download-cv', function () {
    // Cari CV yang statusnya ACTIVE
    $resume = Resume::where('is_active', true)->first();

    if (!$resume) {
        return back()->with('error', 'CV not available at the moment.');
    }

    // TRACKING: Simpan data downloader
    ResumeDownload::create([
        'resume_id' => $resume->id,
        'ip_address' => request()->ip(),
        'user_agent' => request()->header('User-Agent'), // Info Browser/HP
    ]);

    // Download File
    return Storage::disk('public')->download($resume->file_path, $resume->name . '.pdf');
})->name('cv.download');


// 2. ROUTE ADMIN (Tambahkan di dalam grup middleware auth/admin)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // ... route lain ...

    Route::resource('resumes', App\Http\Controllers\Admin\ResumeController::class)->only(['index', 'store', 'destroy']);
    Route::post('/resumes/{id}/activate', [App\Http\Controllers\Admin\ResumeController::class, 'activate'])->name('resumes.activate');
    Route::get('/resumes/{id}/logs', [App\Http\Controllers\Admin\ResumeController::class, 'logs'])->name('resumes.logs');
});


// Pakai ::class
// Route Inbox / Contact Message

Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');
