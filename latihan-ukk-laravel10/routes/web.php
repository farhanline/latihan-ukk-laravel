<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerusahaanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Halaman Utama
Route::get('/', function () {
    return 'Halaman Utama E-PKL';
});


// Informasi
Route::get('/tentang', function () {
    return 'Halaman ini berisi informasi tentang modul E-PKL sekolah.';
});


Route::get('/kontak', function () {
    return 'Hubungi guru pembimbing PKL di ruang RPL.';
});


// Controller Perusahaan
Route::get('/perusahaan', [
    PerusahaanController::class,
    'index'
])->name('perusahaan.index');

Route::get('/perusahaan/{id}', [
    PerusahaanController::class,
    'show'
])->name('perusahaan.show');


// CRUD Siswa
Route::resource('siswa', SiswaController::class);


// Route Group Perusahaan Admin
Route::prefix('admin-perusahaan')
    ->name('perusahaan.')
    ->group(function () {


        Route::get('/list', function () {

            return 'Daftar semua perusahaan mitra PKL';

        })->name('list');


      

    });