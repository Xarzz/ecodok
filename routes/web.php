<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Auth;

// AUTH
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
});

// USER YANG LOGIN
Route::middleware(['auth'])->group(function () {
    Route::middleware('can:admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/jadwal-piket', JadwalController::class);
        Route::resource('/dokumentasi', DokumentasiController::class);
        Route::resource('/kelas-siswa', KelasController::class);
    });

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

// Akses root langsung ke login atau dashboard
Route::get('/', function () {
    return Auth::check() ? redirect()->route('admin.dashboard') : redirect()->route('login');
})->name('root');
