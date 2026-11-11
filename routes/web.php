<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');   
})->middleware('auth')->name('dashboard');

// Rute Modul Akademik
Route::middleware('auth')->group(function () {
    // Full CRUD Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class)->except('show');

    Route::resource('dosen', DosenController::class)->except('show');
    Route::resource('matakuliah', MatakuliahController::class)->except('show');
    Route::view('/kelas', 'kelas')->name('kelas.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
