<?php

use App\Http\Controllers\AuhtController;
use App\Http\Controllers\barangInventarisController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuhtController::class, 'index'])->name('login');
Route::post('login', [AuhtController::class, 'authenticate'])->name('auth.login');

Route::group(['middleware' => ['role:SU']], function () {
    Route::get('dashboard', [homeController::class, 'index'])->name('dashboard');

    Route::get('inventaris', [barangInventarisController::class, 'index'])->name('inventaris');
    Route::post('inventaris/kategori', [barangInventarisController::class, 'addkategori'])->name('kategori');
    Route::post('inventaris/barang', [barangInventarisController::class, 'addbarang'])->name('barang');
});
