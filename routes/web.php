<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home.dashboard');

Route::get('/home', function () {
    return view('backend.index');
})->name('home');

Route::get('/masuk', function() {return view('auth.login');})->name('login.page');

Route::prefix('inventaris')->group(function() {
    Route::get('/', [InventarisController::class, 'index'])->name('inven.index');
    Route::get('/tersedia', [InventarisController::class, 'tersedia'])->name('inven.tersedia');
    Route::get('/tidak', [InventarisController::class, 'tidak'])->name('inven.tidak');
    Route::get('/maintenance', [InventarisController::class, 'maintenance'])->name('inven.maintenance');
    Route::get('/create', [InventarisController::class, 'create'])->name('inven.create');
});

Route::prefix('lokasi')->group(function() {
    Route::get('/', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('/create', [LokasiController::class, 'create'])->name('lokasi.create');
});

Route::prefix('peminjaman')->group(function() {
    Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
});
