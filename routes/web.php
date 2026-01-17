<?php

use Illuminate\Support\Facades\Route;

// --- FRONTEND ROUTES ---
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


// --- ADMIN ROUTES (Nanti bisa dikelompokkan dengan Middleware Auth) ---
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
