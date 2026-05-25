<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\RespondenController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserDashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [HomeController::class, 'createResponden'])->name('register');
Route::post('/register', [HomeController::class, 'storeResponden']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('users', UserController::class);

    // CRUD Resources
    Route::resource('layanans', LayananController::class);
    Route::resource('wilayahs', WilayahController::class);
    Route::resource('respondens', RespondenController::class);
    Route::resource('pertanyaans', PertanyaanController::class);
    Route::resource('kritiks', KritikController::class);
    Route::resource('jawabans', JawabanController::class);
    
    // Laporan
    Route::get('/laporans', [LaporanController::class, 'index'])->name('laporans.index');
    Route::get('/laporans/export/responden', [LaporanController::class, 'exportResponden'])->name('laporans.export.responden');
    Route::get('/laporans/export/jawaban', [LaporanController::class, 'exportJawaban'])->name('laporans.export.jawaban');
    Route::get('/laporans/export/kritik', [LaporanController::class, 'exportKritik'])->name('laporans.export.kritik');
    Route::get('/laporans/export/summary', [LaporanController::class, 'exportSummary'])->name('laporans.export.summary');
});

// User Routes (for role 'user')
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/jawab-pertanyaan', [UserDashboardController::class, 'jawabPertanyaan'])->name('jawab-pertanyaan');
    Route::post('/jawab-pertanyaan', [UserDashboardController::class, 'storeJawabPertanyaan'])->name('jawab-pertanyaan.store');
    
    Route::get('/rating', [UserDashboardController::class, 'rating'])->name('rating');
    Route::post('/rating', [UserDashboardController::class, 'storeRating'])->name('rating.store');
    
    Route::get('/kritik', [UserDashboardController::class, 'kritik'])->name('kritik');
    Route::post('/kritik', [UserDashboardController::class, 'storeKritik'])->name('kritik.store');
});
