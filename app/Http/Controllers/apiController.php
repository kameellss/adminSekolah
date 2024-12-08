<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function allMateri (){
        $materi = Materi::with('mataPelajaran')->get();
        return response()->json([
            'success' => true,
            'data' => $materi,
        ], 200); 
    }
    public function allTugas (){
        $materi = Tugas::with('mataPelajaran')->get();
        return response()->json([
            'success' => true,
            'data' => $materi,
        ], 200); 
    }

    public function allMapel (){
        $materi = MataPelajaran::all();
        return response()->json([
            'success' => true,
            'data' => $materi,
        ], 200); 
    }
}
