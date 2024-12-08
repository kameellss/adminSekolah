<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data statistik
        $statistik = MataPelajaran::withCount(['tugas', 'materi'])->get();
        $materi = Materi::count();
        $mapel = MataPelajaran::count();
        $tugas = Tugas::count();

        // Menyiapkan data untuk grafik
        $dataChart = [
            'labels' => $statistik->pluck('nama_pelajaran'), // Nama mata pelajaran
            'tugas' => $statistik->pluck('tugas_count'),     // Jumlah tugas
            'materi' => $statistik->pluck('materi_count'),   // Jumlah materi
        ];

        return view('dashboard', [
            'dataChart' => $dataChart,
            'materiCount' => $materi,
            'mapelCount'=>$mapel,
            'tugasCount'=>$tugas
        ]);
    }
}
