<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LaporanPresensiController;

// Authenticate
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('check', [AuthController::class, 'check'])->name('check');


Route::middleware(['auth'])->group(function () {
    Route::get('/reset-password', [AuthController::class, 'reset_password'])->name('reset-password');
    Route::post('/reset', [AuthController::class, 'reset'])->name('reset');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'role:superadmin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-home');  
        // SDM
            // USER
            Route::get('/user', [UserController::class, 'index'])->name('user-index');
            Route::post('/user-store', [UserController::class, 'store'])->name('user-store');
            Route::get('/user-list', [UserController::class, 'getUser'])->name('user-list');
            Route::get('/user-detail/{id}', [UserController::class, 'detail'])->name('user-detail');
            // DIVISI
            Route::get('/divisi', [DivisionController::class, 'index'])->name('divisi-index');
            Route::post('/divisi/store', [DivisionController::class, 'store'])->name('divisi-store');
            Route::get('/divisi-list', [DivisionController::class, 'getDivision'])->name('divisi-list');
            Route::get('/divisi/fetch/{id}', [DivisionController::class, 'fetchData'])->name('divisi-fetch');
            Route::post('/divisi/update/{id}', [DivisionController::class, 'updateData'])->name('divisi-update');
            Route::delete('/divisi/delete/{id}', [DivisionController::class, 'destroy'])->name('divisi-destroy');

            Route::get('/daftar-hadir', [AttendanceController::class,'index'])->name('daftar-hadir');
            Route::get('/daftar-hadir-list', [AttendanceController::class,'getAttendances'])->name('daftar-hadir-list');
        });

        Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user-update');


    Route::post('/attendance', [AttendanceController::class, 'storeAttendanceIn'])->name('attendance.store.in');

    // Presensi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi-home');
    Route::get('/presensi/scan/in', [PresensiController::class, 'scanIn'])->name('presensi-scan');
    Route::get('/laporan-presensi', [LaporanPresensiController::class, 'index'])->name('laporan-presensi');
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');
});