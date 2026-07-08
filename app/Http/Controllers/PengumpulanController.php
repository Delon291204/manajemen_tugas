<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengumpulanTugas;
use App\Models\Tugas;

class PengumpulanController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'file_tugas' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        $cek = PengumpulanTugas::where('id_tugas', $id)
            ->where('id_mahasiswa', auth()->id())
            ->first();

        if ($cek) {
            return back()
                ->with('error', 'Tugas sudah dikumpulkan');
        }

        $tugas = Tugas::findOrFail($id);

        if (now() > $tugas->deadline) {
            return back()
                ->with('error', 'Deadline tugas sudah berakhir');
        }

        $file = $request->file('file_tugas');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('uploads'), $namaFile);

        PengumpulanTugas::create([
            'id_tugas' => $id,
            'id_mahasiswa' => auth()->id(),
            'tanggal_kumpul' => now(),
            'file_tugas' => $namaFile,
            'status' => 'dikumpulkan'
        ]);

        return back()
            ->with('success', 'Tugas berhasil dikumpulkan');
    }

    public function beriNilai(Request $request, $id)
    {
        $request->validate([
    'nilai' => 'required|integer|min:0|max:100',
    'feedback' => 'nullable|string'
]);

        $pengumpulan = PengumpulanTugas::findOrFail($id);

        $pengumpulan->update([
    'nilai' => $request->nilai,
    'feedback' => $request->feedback,
    'status' => 'dinilai'
]);

        return back()
            ->with('success', 'Nilai berhasil disimpan');
    }
}