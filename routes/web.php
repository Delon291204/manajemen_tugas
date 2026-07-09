<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumpulanController;

/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    // Jika sudah login
    if (Auth::check()) {

        if (Auth::user()->role == 'dosen') {
            return redirect('/dashboard-dosen');
        }

        if (Auth::user()->role == 'mahasiswa') {
            return redirect('/dashboard-mahasiswa');
        }

    }

    // Jika belum login
    return view('auth.login');

})->middleware('guest');

/*
|--------------------------------------------------------------------------
| Dashboard Default
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (Auth::user()->role == 'dosen') {
        return redirect('/dashboard-dosen');
    }

    return redirect('/dashboard-mahasiswa');

})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| DOSEN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:dosen'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard-dosen',
        [DashboardController::class, 'dashboardDosen']
    );

    /*
    |--------------------------------------------------------------------------
    | Mata Kuliah
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'mata-kuliah',
        MataKuliahController::class
    );

    /*
    |--------------------------------------------------------------------------
    | Tugas Berdasarkan Mata Kuliah
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/mata-kuliah/{id}/tugas',
        [TugasController::class, 'tugasPerMataKuliahDosen']
    );

    Route::get(
        '/mata-kuliah/{id}/tugas/create',
        [TugasController::class, 'createPerMataKuliah']
    );

    Route::post(
        '/mata-kuliah/{id}/tugas',
        [TugasController::class, 'storePerMataKuliah']
    );

    /*
    |--------------------------------------------------------------------------
    | CRUD Semua Tugas
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'tugas',
        TugasController::class
    )->parameters([
        'tugas' => 'tugas'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Pengumpulan
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/pengumpulan-dosen/{id}',
        [TugasController::class, 'pengumpulan']
    );

    Route::post(
        '/pengumpulan/{id}/nilai',
        [PengumpulanController::class, 'beriNilai']
    );

});

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard-mahasiswa',
        [DashboardController::class, 'dashboardMahasiswa']
    );

    /*
    |--------------------------------------------------------------------------
    | Mata Kuliah
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/mata-kuliah-mahasiswa',
        [TugasController::class, 'mataKuliahMahasiswa']
    );

    /*
    |--------------------------------------------------------------------------
    | Daftar Tugas per Mata Kuliah
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/mata-kuliah-mahasiswa/{id}',
        [TugasController::class, 'tugasPerMataKuliah']
    );

    /*
    |--------------------------------------------------------------------------
    | Route Lama (Opsional)
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/tugas-mahasiswa',
        [TugasController::class, 'mahasiswa']
    );

    /*
    |--------------------------------------------------------------------------
    | Form Upload Tugas
    |--------------------------------------------------------------------------
    */

    Route::get('/pengumpulan/{id}', function ($id) {

        $tugas = \App\Models\Tugas::findOrFail($id);

        return view(
            'tugas.pengumpulan',
            compact('tugas')
        );

    });

    /*
    |--------------------------------------------------------------------------
    | Upload Tugas
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/pengumpulan/{id}',
        [PengumpulanController::class, 'store']
    );

});

require __DIR__.'/auth.php';
