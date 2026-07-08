<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\MataKuliah;
use App\Models\PengumpulanTugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::with('mataKuliah')->get();

        return view('tugas.index', compact('tugas'));
    }

    /**
     * Halaman daftar mata kuliah mahasiswa
     */
    public function mataKuliahMahasiswa()
    {
        $mataKuliah = MataKuliah::all();

        return view(
            'mahasiswa.mata_kuliah',
            compact('mataKuliah')
        );
    }

    /**
     * Halaman daftar tugas berdasarkan mata kuliah
     */
    public function tugasPerMataKuliah($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);

        $tugas = Tugas::where('id_mk', $id)->get();

        $pengumpulanSaya = PengumpulanTugas::where(
            'id_mahasiswa',
            auth()->id()
        )->get();

        return view(
            'mahasiswa.tugas',
            compact(
                'mataKuliah',
                'tugas',
                'pengumpulanSaya'
            )
        );
    }

    /**
 * Form tambah tugas berdasarkan mata kuliah
 */
public function createPerMataKuliah($id)
{
    $mataKuliah = MataKuliah::findOrFail($id);

    return view(
        'tugas.create_per_mata_kuliah',
        compact('mataKuliah')
    );
}

/**
 * Simpan tugas berdasarkan mata kuliah
 */
public function storePerMataKuliah(Request $request, $id)
{
    $request->validate([
        'judul_tugas' => 'required|string|max:255',
        'deskripsi' => 'required',
        'deadline' => 'required|date'
    ]);

    MataKuliah::findOrFail($id);

    Tugas::create([
        'id_mk' => $id,
        'judul_tugas' => $request->judul_tugas,
        'deskripsi' => $request->deskripsi,
        'deadline' => $request->deadline,
        'status' => 'aktif'
    ]);

    return redirect('/mata-kuliah/' . $id . '/tugas')
        ->with('success', 'Tugas berhasil ditambahkan.');
}

    /**
 * Halaman daftar tugas berdasarkan mata kuliah (Dosen)
 */
public function tugasPerMataKuliahDosen($id)
{
    $mataKuliah = MataKuliah::findOrFail($id);

    $tugas = Tugas::where('id_mk', $id)
        ->with('mataKuliah')
        ->get();

    return view(
        'tugas.index_per_mata_kuliah',
        compact(
            'mataKuliah',
            'tugas'
        )
    );
}

    /**
     * Halaman lama mahasiswa
     * (sementara masih dipertahankan)
     */
    public function mahasiswa()
    {
        $tugas = Tugas::all();

        $pengumpulanSaya = PengumpulanTugas::where(
            'id_mahasiswa',
            auth()->id()
        )->get();

        return view(
            'tugas.mahasiswa',
            compact('tugas', 'pengumpulanSaya')
        );
    }

    /**
     * Daftar pengumpulan tugas
     */
    public function pengumpulan($id)
    {
        $pengumpulan = PengumpulanTugas::with('mahasiswa')
            ->where('id_tugas', $id)
            ->get();

        return view(
            'tugas.pengumpulan_dosen',
            compact('pengumpulan')
        );
    }

    /**
     * Form tambah tugas
     */
    public function create()
    {
        $mataKuliah = MataKuliah::where(
            'id_dosen',
            auth()->id()
        )->get();

        return view(
            'tugas.create',
            compact('mataKuliah')
        );
    }

    /**
     * Simpan tugas
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mk' => 'required|exists:mata_kuliah,id',
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'required',
            'deadline' => 'required|date'
        ]);

        Tugas::create([
            'id_mk' => $request->id_mk,
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'status' => 'aktif'
        ]);

        return redirect('/tugas')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Form edit tugas
     */
    public function edit(Tugas $tugas)
{
    $tugas->load('mataKuliah');

    return view('tugas.edit', compact('tugas'));
}

    /**
     * Update tugas
     */
    public function update(Request $request, Tugas $tugas)
{
    $request->validate([
        'judul_tugas' => 'required|string|max:255',
        'deskripsi' => 'required',
        'deadline' => 'required|date'
    ]);

    $tugas->update([
        'judul_tugas' => $request->judul_tugas,
        'deskripsi' => $request->deskripsi,
        'deadline' => $request->deadline,
    ]);

    return redirect('/mata-kuliah/' . $tugas->id_mk . '/tugas')
        ->with('success', 'Tugas berhasil diperbarui.');
}

    /**
     * Hapus tugas
     */
   public function destroy(Tugas $tugas)
{
    $idMataKuliah = $tugas->id_mk;

    $tugas->delete();

    return redirect('/mata-kuliah/' . $idMataKuliah . '/tugas')
        ->with('success', 'Tugas berhasil dihapus.');
}
}