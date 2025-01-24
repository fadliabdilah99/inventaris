<?php

use App\Http\Controllers\AuhtController;
use App\Http\Controllers\barangInventarisController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\peminjamanbarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuhtController::class, 'index'])->name('login');
Route::post('login', [AuhtController::class, 'authenticate'])->name('auth.login');

Route::group(['middleware' => ['role:SU']], function () {
    Route::get('dashboard', [homeController::class, 'index'])->name('dashboard');

    // inventaris
    Route::get('inventaris', [barangInventarisController::class, 'index'])->name('inventaris');
    Route::post('inventaris/kategori', [barangInventarisController::class, 'addkategori'])->name('kategori');
    Route::post('inventaris/barang', [barangInventarisController::class, 'addbarang'])->name('barang');

    // peminjaman
    Route::get('peminjaman', [peminjamanbarangController::class, 'index'])->name('peminjaman');
    Route::post('peminjaman/pinjam', [peminjamanbarangController::class, 'pinjam'])->name('pinjam-barang');
    Route::get('peminjaman/pinjam/list/{id}', [peminjamanbarangController::class, 'list'])->name('pinjam-barang-list');
    Route::post('peminjaman/pinjam/add', [peminjamanbarangController::class, 'add'])->name('add-pinjam');
});
