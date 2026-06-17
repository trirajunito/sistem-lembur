<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {

//dashboard

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');

//karyawan dan hrd
    Route::resource('karyawan', KaryawanController::class)
        ->middleware('role:admin');

//lembur

    Route::resource('lembur', LemburController::class);

//Persetujan atasan
    Route::get('/approval', [
        ApprovalController::class,
        'index'
    ])->middleware('role:atasan')
      ->name('approval.index');


    Route::put('/lembur/{id}/approve', [
        LemburController::class,
        'approve'
    ])->middleware('role:atasan')
      ->name('lembur.approve');


    Route::put('/lembur/{id}/reject', [
        LemburController::class,
        'reject'
    ])->middleware('role:atasan')
      ->name('lembur.reject');

//laporan
    Route::get('/laporan', [
        LaporanController::class,
        'index'
    ])->name('laporan.index');

});

require __DIR__ . '/auth.php';