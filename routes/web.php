<?php

use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserLayananController;
use App\Models\JenisLayanan;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->middleware('guest')->name('login');

// Captcha Route
Route::get('/simple-captcha', [CaptchaController::class, 'generate'])->name('captcha.generate');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate'); // ini proses login (POST)

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('services', JenisLayananController::class);

});
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('userlayanan', [UserLayananController::class, 'index'])->name('userlayanan.index');
});
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::put('/layanan/{id}/status', [AdminLayananController::class, 'updateStatus'])->name('update.status');
    Route::put('/layanan/{id}/memo', [AdminLayananController::class, 'updateMemo'])->name('update.memo');
    Route::get('adminlayanan', [AdminLayananController::class, 'index'])->name('adminlayanan.index');
});


 Route::resource('layanan', LayananController::class);


