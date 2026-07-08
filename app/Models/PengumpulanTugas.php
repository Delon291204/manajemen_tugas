<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tugas;

class PengumpulanTugas extends Model
{
    protected $table = 'pengumpulan_tugas';

    protected $fillable = [
        'id_tugas',
        'id_mahasiswa',
        'tanggal_kumpul',
        'file_tugas',
        'status',
        'nilai',
        'feedback'
    ];

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }

    // Relasi ke Tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }
}