<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliah;
use App\Models\PengumpulanTugas;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'id_mk',
        'judul_tugas',
        'deskripsi',
        'deadline',
        'lampiran',
        'status'
    ];

    // Relasi ke Mata Kuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mk');
    }

    // Relasi ke Pengumpulan Tugas
    public function pengumpulan()
    {
        return $this->hasMany(PengumpulanTugas::class, 'id_tugas');
    }
}