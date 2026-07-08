<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\PengumpulanTugas;
use App\Models\Tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard Dosen
     */
    public function dashboardDosen()
    {
        // Total Mata Kuliah milik dosen
        $totalMataKuliah = MataKuliah::where(
            'id_dosen',
            auth()->id()
        )->count();

        // Total Tugas milik dosen
        $totalTugas = Tugas::whereHas('mataKuliah', function ($query) {
            $query->where('id_dosen', auth()->id());
        })->count();

        // Total Pengumpulan
        $totalPengumpulan = PengumpulanTugas::whereHas('tugas.mataKuliah', function ($query) {
            $query->where('id_dosen', auth()->id());
        })->count();

        // Belum Dinilai
        $belumDinilai = PengumpulanTugas::whereNull('nilai')
            ->whereHas('tugas.mataKuliah', function ($query) {
                $query->where('id_dosen', auth()->id());
            })
            ->count();

        // Sudah Dinilai
        $sudahDinilai = PengumpulanTugas::whereNotNull('nilai')
            ->whereHas('tugas.mataKuliah', function ($query) {
                $query->where('id_dosen', auth()->id());
            })
            ->count();

        // 5 Tugas Terbaru
        $tugasTerbaru = Tugas::with('mataKuliah')
            ->whereHas('mataKuliah', function ($query) {
                $query->where('id_dosen', auth()->id());
            })
            ->latest()
            ->take(5)
            ->get();

        // 5 Pengumpulan Terbaru
        $pengumpulanTerbaru = PengumpulanTugas::with([
                'mahasiswa',
                'tugas'
            ])
            ->whereHas('tugas.mataKuliah', function ($query) {
                $query->where('id_dosen', auth()->id());
            })
            ->latest()
            ->take(5)
            ->get();

        return view(
            'dashboard.dosen',
            compact(
                'totalMataKuliah',
                'totalTugas',
                'totalPengumpulan',
                'belumDinilai',
                'sudahDinilai',
                'tugasTerbaru',
                'pengumpulanTerbaru'
            )
        );
    }

    /**
     * Dashboard Mahasiswa
     */
    public function dashboardMahasiswa()
    {
        // Total Mata Kuliah
        $totalMataKuliah = MataKuliah::count();

        // Total Tugas
        $totalTugas = Tugas::count();

        // Sudah Dikumpulkan
        $sudahDikumpulkan = PengumpulanTugas::where(
            'id_mahasiswa',
            auth()->id()
        )->count();

        // Belum Dikumpulkan
        $belumDikumpulkan = max(
            0,
            $totalTugas - $sudahDikumpulkan
        );

        // Rata-rata Nilai
        $rataRataNilai = PengumpulanTugas::where(
            'id_mahasiswa',
            auth()->id()
        )
        ->whereNotNull('nilai')
        ->avg('nilai');

        // Deadline Terdekat
$deadlineTerdekat = Tugas::with('mataKuliah')
    ->orderBy('deadline')
    ->take(5)
    ->get();

        return view(
            'dashboard.mahasiswa',
            compact(
                'totalMataKuliah',
                'totalTugas',
                'sudahDikumpulkan',
                'belumDikumpulkan',
                'rataRataNilai',
                'deadlineTerdekat'
            )
        );
    }
}