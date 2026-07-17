<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_mata_kuliah')->insert([

            [
                'kode_mk' => 'SI101',
                'nama_mk' => 'Pengantar Teknologi Informasi',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI102',
                'nama_mk' => 'Algoritma dan Pemrograman',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI103',
                'nama_mk' => 'Matematika Diskrit',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI104',
                'nama_mk' => 'Logika Informatika',
                'sks' => 2,
            ],
            [
                'kode_mk' => 'SI201',
                'nama_mk' => 'Struktur Data',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI202',
                'nama_mk' => 'Basis Data',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI203',
                'nama_mk' => 'Pemrograman Berorientasi Objek',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI204',
                'nama_mk' => 'Pemrograman Web',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI205',
                'nama_mk' => 'Sistem Operasi',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI206',
                'nama_mk' => 'Jaringan Komputer',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI301',
                'nama_mk' => 'Analisis dan Perancangan Sistem',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI302',
                'nama_mk' => 'Sistem Informasi Manajemen',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI303',
                'nama_mk' => 'Rekayasa Perangkat Lunak',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI304',
                'nama_mk' => 'Interaksi Manusia dan Komputer',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI305',
                'nama_mk' => 'Manajemen Proyek TI',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI306',
                'nama_mk' => 'Business Intelligence',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI401',
                'nama_mk' => 'Data Mining',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI402',
                'nama_mk' => 'Keamanan Informasi',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI403',
                'nama_mk' => 'Cloud Computing',
                'sks' => 3,
            ],
            [
                'kode_mk' => 'SI404',
                'nama_mk' => 'Kecerdasan Buatan',
                'sks' => 3,
            ],

        ]);
    }
}