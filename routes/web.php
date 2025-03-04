<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\IzinCutiController;
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
            Route::get('/export-attendances', [AttendanceController::class, 'exportAttendances'])->name('export-attendances');

            Route::get('/pengumuman-list', [AnnouncementController::class,'getAnnouncement'])->name('pengumuman-list');
            Route::post('/pengumuman-buat', [AnnouncementController::class,'store'])->name('pengumuman-store');

            Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule-index');

            Route::post('store-schedule', [ScheduleController::class, 'store'])->name('schedule-store');
            Route::get('/schedule-list', [ScheduleController::class, 'getSchedule'])->name('schedule-list');


            Route::get('/izin-cuti-dashboard', [IzinCutiController::class, 'indexDashboard'])->name('izin-cuti-dashboard');
            Route::get('/izin-cuti-list', [IzinCutiController::class, 'getIzin'])->name('izin-cuti-list');
        });

        Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user-update');


    Route::post('/attendance', [AttendanceController::class, 'storeAttendanceIn'])->name('attendance.store.in');

    // Presensi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi-home');
    Route::get('/presensi/scan/in', [PresensiController::class, 'scanIn'])->name('presensi-scan');
    Route::get('/laporan-presensi', [LaporanPresensiController::class, 'index'])->name('laporan-presensi');
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');


    Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('pengumuman-index');

    Route::get('/izin-cuti', [IzinCutiController::class, 'index'])->name('izin-cuti');
    Route::post('/izin-cuti-store', [IzinCutiController::class, 'store'])->name('izin-cuti-store');
    Route::get('/riwayat-izin-cuti', [IzinCutiController::class, 'riwayat'])->name('riwayat-izin-cuti');

    Route::get('/setujui-izin-cuti/{id}', [IzinCutiController::class, 'accptIzin'])->name('accpt-izin-cuti');
    Route::get('/tolak-izin-cuti/{id}', [IzinCutiController::class, 'rejectIzin'])->name('reject-izin-cuti');
});
