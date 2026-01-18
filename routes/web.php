<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\AuthController;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project; 



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. FRONTEND (PUBLIK) ---
Route::get('/', function () {
    // Ambil data Sertifikat
    $certificates = Certificate::orderBy('is_pinned', 'desc')
                               ->orderBy('issued_year', 'desc')
                               ->get();

    // Ambil data Project (Terbaru)
    $projects = Project::latest()->get();
    $tech_experiences = Experience::where('type', 'tech')->latest()->get();
    $prof_experiences = Experience::where('type', 'professional')->latest()->get();


    return view('frontend.home', compact('certificates', 'projects','tech_experiences','prof_experiences'));
})->name('home');


//api token monkeytype
//    Njk2Yzk2OGM0MjhiNjk2MTlhY2I4NmY4LnMxckVaUEhWX2tpRzJBeWF5bm43dzQzUVNwdTlpOXdZ



/*
|--------------------------------------------------------------------------
| Debug ENV (sementara)
|--------------------------------------------------------------------------
*/
Route::get('/debug-env', function () {
    return response()->json([
        'monkeytype_token' => env('MONKEYTYPE_TOKEN'),
    ]);
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
});



