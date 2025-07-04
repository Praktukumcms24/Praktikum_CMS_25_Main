<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ImageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama diarahkan ke daftar pelanggan
Route::get('/', function () {
    return redirect('/login');
});

// ==========================
// CRUD Pelanggan
// ==========================
Route::get('/pelanggan',             [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create',      [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan',            [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}',        [PelangganController::class, 'show'])->name('pelanggan.show');
Route::get('/pelanggan/{id}/edit',   [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}',        [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}',     [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// ==========================
// Middleware Contoh
// ==========================
Route::get('/pendaftaran-ktp', function () {
    return 'Selamat datang di halaman pendaftaran KTP Online!';
})->middleware('check.age');

// ==========================
// Upload Gambar
// ==========================
Route::get('/upload',                [ImageController::class, 'create'])->name('image.create');
Route::post('/upload',               [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}',        [ImageController::class, 'destroy'])->name('image.delete');



// Login / Logout
Route::get('/login',  [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    // dan route lainnya...
});
