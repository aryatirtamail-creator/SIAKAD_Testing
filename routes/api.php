<?php

use App\Http\Controllers\API\AcademicDataController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('mahasiswa', [AcademicDataController::class, 'mahasiswa']);
    Route::get('matakuliah', [AcademicDataController::class, 'matakuliah']);
});
