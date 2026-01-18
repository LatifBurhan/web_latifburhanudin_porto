<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ProjectController; // Import Controller Project
use App\Http\Controllers\AuthController;
use App\Models\Certificate;
use App\Models\Project; // <--- INI WAJIB DITAMBAHKAN AGAR TIDAK ERROR

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

    return view('frontend.home', compact('certificates', 'projects'));
})->name('home');


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

});
