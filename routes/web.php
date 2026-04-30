<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes untuk Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard yang diproteksi login
Route::middleware(['auth'])->group(function () {
    
    // Dashboard untuk Bendahara
    Route::get('/bendahara/dashboard', [\App\Http\Controllers\Bendahara\DashboardController::class, 'index'])->name('bendahara.dashboard');

    // Dashboard untuk Siswa
    Route::get('/siswa/dashboard', [\App\Http\Controllers\Siswa\DashboardController::class, 'index'])->name('siswa.dashboard');

});
