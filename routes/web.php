<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// halaman awal
Route::get('/', function () {
    return view('welcome');
});

// dashboard (setelah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// semua route yang butuh login
Route::middleware(['auth'])->group(function () {

    // profile (bawaan breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🔥 CRUD UTAMA (WAJIB SOAL)
    Route::resource('jurusan', JurusanController::class);
    Route::get(
'/jurusan/export/excel',
[JurusanController::class, 'exportExcel']
)->name('jurusan.export.excel');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::get(
    '/mahasiswa/export/excel',
    [MahasiswaController::class, 'exportExcel']
)->name('mahasiswa.export.excel');
    Route::resource('matakuliah', MatakuliahController::class);
});

Route::get(
    '/jurusan/export/pdf',
    [JurusanController::class, 'exportPdf']
)->name('jurusan.export.pdf');

Route::get(
    '/mahasiswa/export/pdf',
    [MahasiswaController::class, 'exportPdf']
)->name('mahasiswa.export.pdf');

Route::get(
    '/matakuliah/export/excel',
    [MatakuliahController::class, 'exportExcel']
)->name('matakuliah.export.excel');

Route::get(
    '/matakuliah/export/pdf',
    [MatakuliahController::class, 'exportPdf']
)->name('matakuliah.export.pdf');

// auth bawaan (login, register, dll)
require __DIR__.'/auth.php';