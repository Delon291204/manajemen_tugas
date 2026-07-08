<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $fillable = [
        'nama_mk',
        'kode_mk',
        'id_dosen',
        'semester'
    ];

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_mk');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen');
    }
}