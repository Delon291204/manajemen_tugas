<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterMataKuliah;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataKuliah = MataKuliah::where(
            'id_dosen',
            auth()->id()
        )->get();

        return view(
            'mata_kuliah.index',
            compact('mataKuliah')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $masterMataKuliah = MasterMataKuliah::orderBy('nama_mk')->get();

    return view(
        'mata_kuliah.create',
        compact('masterMataKuliah')
    );
}

    /**
     * Store a newly created resource.
     */
public function store(Request $request)
{
    $request->validate([
        'master_mata_kuliah' => 'required|exists:master_mata_kuliah,id',
        'semester' => 'required|integer|min:1|max:14',
    ]);

    $master = MasterMataKuliah::findOrFail(
        $request->master_mata_kuliah
    );

    // Cek apakah mata kuliah sudah pernah ditambahkan
$cek = MataKuliah::where('id_dosen', auth()->id())
    ->where('kode_mk', $master->kode_mk)
    ->where('semester', $request->semester)
    ->exists();

if ($cek) {

    return back()
        ->withInput()
        ->withErrors([
            'master_mata_kuliah' =>
                'Mata kuliah tersebut sudah terdaftar pada semester ini.'
        ]);
}

    MataKuliah::create([
        'nama_mk'   => $master->nama_mk,
        'kode_mk'   => $master->kode_mk,
        'semester'  => $request->semester,
        'id_dosen'  => auth()->id(),
    ]);

    return redirect('/mata-kuliah')
        ->with(
            'success',
            'Mata kuliah berhasil ditambahkan.'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $mataKuliah = MataKuliah::findOrFail($id);

    $masterMataKuliah = MasterMataKuliah::orderBy('nama_mk')->get();

    return view(
        'mata_kuliah.edit',
        compact(
            'mataKuliah',
            'masterMataKuliah'
        )
    );
}

    /**
     * Update the specified resource.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'master_mata_kuliah' => 'required|exists:master_mata_kuliah,id',
        'semester' => 'required|integer|min:1|max:14',
    ]);

    $mataKuliah = MataKuliah::findOrFail($id);

    $master = MasterMataKuliah::findOrFail(
        $request->master_mata_kuliah
    );

    $mataKuliah->update([
        'nama_mk'  => $master->nama_mk,
        'kode_mk'  => $master->kode_mk,
        'semester' => $request->semester,
    ]);

    return redirect('/mata-kuliah')
        ->with(
            'success',
            'Mata kuliah berhasil diperbarui.'
        );
}

    /**
     * Remove the specified resource.
     */
    public function destroy(string $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);

    $mataKuliah->delete();

    return redirect('/mata-kuliah')
        ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}