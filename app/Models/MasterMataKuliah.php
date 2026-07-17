<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterMataKuliah extends Model
{
    protected $table = 'master_mata_kuliah';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
    ];
}