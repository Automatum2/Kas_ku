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
    Route::post('/bendahara/transaksi/{id}/terima', [\App\Http\Controllers\Bendahara\DashboardController::class, 'terima'])->name('bendahara.transaksi.terima');
    Route::post('/bendahara/transaksi/{id}/tolak', [\App\Http\Controllers\Bendahara\DashboardController::class, 'tolak'])->name('bendahara.transaksi.tolak');
    Route::post('/bendahara/bayar', [\App\Http\Controllers\Bendahara\DashboardController::class, 'bayar'])->name('bendahara.bayar');
    Route::get('/bendahara/tentang', [\App\Http\Controllers\Bendahara\DashboardController::class, 'tentang'])->name('bendahara.tentang');

    // Dashboard untuk Siswa
    Route::get('/siswa/dashboard', [\App\Http\Controllers\Siswa\DashboardController::class, 'index'])->name('siswa.dashboard');
    Route::post('/siswa/bayar', [\App\Http\Controllers\Siswa\DashboardController::class, 'bayar'])->name('siswa.bayar');
    Route::get('/siswa/tentang', [\App\Http\Controllers\Siswa\DashboardController::class, 'tentang'])->name('siswa.tentang');
    
    });

   
    Route::get('/lapor-bendahara', function () {
        return view('lapor_bendahara');
    });