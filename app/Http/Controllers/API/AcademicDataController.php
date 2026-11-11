<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\JsonResponse;

class AcademicDataController extends Controller
{
    public function mahasiswa(): JsonResponse
    {
        return response()->json(Mahasiswa::all());
    }

    public function matakuliah(): JsonResponse
    {
        return response()->json(Matakuliah::all());
    }
}
