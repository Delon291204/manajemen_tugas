<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('mata_kuliah.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama_mk' => 'required|string|max:255',
        'kode_mk' => 'required|string|max:50',
        'semester' => 'required'
    ]);

    MataKuliah::create([
        'nama_mk' => $request->nama_mk,
        'kode_mk' => $request->kode_mk,
        'semester' => $request->semester,
        'id_dosen' => auth()->id()
    ]);

    return redirect('/mata-kuliah')
        ->with('success', 'Mata kuliah berhasil ditambahkan.');
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

    return view(
        'mata_kuliah.edit',
        compact('mataKuliah')
    );
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama_mk' => 'required|string|max:255',
        'kode_mk' => 'required|string|max:50',
        'semester' => 'required'
    ]);

    $mataKuliah = MataKuliah::findOrFail($id);

    $mataKuliah->update([
        'nama_mk' => $request->nama_mk,
        'kode_mk' => $request->kode_mk,
        'semester' => $request->semester,
    ]);

    return redirect('/mata-kuliah')
        ->with('success', 'Mata kuliah berhasil diperbarui.');
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