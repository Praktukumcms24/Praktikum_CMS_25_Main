<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

// Halaman utama diarahkan ke daftar pelanggan
Route::get('/', function () {
    return redirect('/pelanggan');
});

// Rute CR
// UD pelanggan
Route::get('/pelanggan',             [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create',      [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan',            [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}',        [PelangganController::class, 'show'])->name('pelanggan.show');
Route::get('/pelanggan/{id}/edit',   [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}',        [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}',     [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::get('/pendaftaran-ktp', function (){
    return 'selamat datang di halaman pendaftaran KTP Online!';
})->middleware('check.age');