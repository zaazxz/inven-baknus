<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\MaintenanceController;
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

// Route For Non Logged In
Route::group(['middleware' => ['guest']], function () {

    // Guest View
    Route::get('/', [Controller::class, 'landing'])->name('home.dashboard');

    // Login
    Route::get('/login', [AuthController::class, 'index'])->name('login.page');
    Route::post('/auth', [AuthController::class, 'authenticate'])->name('login.auth');

});

// Route for role : Admin & Laboran
Route::group(['middleware' => ['auth', 'role:Administrator,Laboran']], function() {

    // Dashboard
    Route::get('/home', [Controller::class, 'backend'])->name('home');

    // Inventaris
    Route::prefix('inventaris')->group(function() {
        Route::get('/', [InventarisController::class, 'index'])->name('inven.index');
        Route::get('/tersedia', [InventarisController::class, 'tersedia'])->name('inven.tersedia');
        Route::get('/tidak', [InventarisController::class, 'tidak'])->name('inven.tidak');
        Route::get('/create', [InventarisController::class, 'create'])->name('inven.create');
        Route::get('/edit/{inventaris}', [InventarisController::class, 'edit'])->name('inven.edit');
        Route::get('/destroy/{inventaris}', [InventarisController::class, 'destroy'])->name('inven.destroy');
        Route::post('/store', [InventarisController::class, 'store'])->name('inven.store');
        Route::post('/update/{inventaris}', [InventarisController::class, 'update'])->name('inven.update');

        // getting With Ajax
        Route::get('/getcode', [InventarisController::class, 'code'])->name('getvaluecode');
        Route::get('/jumlah', [InventarisController::class, 'jumlah'])->name('getjumlahinven');

    });

    // Lokasi
    Route::prefix('lokasi')->group(function() {
        Route::get('/', [LokasiController::class, 'index'])->name('lokasi.index');
        Route::get('/create', [LokasiController::class, 'create'])->name('lokasi.create');
        Route::get('/edit/{lokasi}', [LokasiController::class, 'edit'])->name('lokasi.edit');
        Route::post('/store', [LokasiController::class, 'store'])->name('lokasi.store');
        Route::post('/update/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
        Route::get('/destroy/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
    });

    // Peminjaman
    Route::prefix('peminjaman')->group(function() {
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::get('/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::get('/destroy/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
        Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::post('/update/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    });

    // Maintenance
    Route::prefix('maintenance')->group(function() {
        Route::get('/', [MaintenanceController::class, 'index'])->name('maintenance.index');
        Route::get('/perbaikan', [MaintenanceController::class, 'perbaikan'])->name('maintenance.perbaikan');
        Route::get('/selesai', [MaintenanceController::class, 'selesai'])->name('maintenance.selesai');
        Route::get('/create', [MaintenanceController::class, 'create'])->name('maintenance.create');
        Route::post('/store', [MaintenanceController::class, 'store'])->name('maintenance.store');
        Route::post('/update/{maintenance}', [MaintenanceController::class, 'update'])->name('maintenance.update');
    });

    // User Profile Edit
    Route::get('/config/edit/{user}', [PenggunaController::class, 'configedit'])->name('config.pengguna.edit');
    Route::post('/config/update/{user}', [PenggunaController::class, 'configupdate'])->name('config.pengguna.update');
    Route::get('/pass/edit/{user}', [PenggunaController::class, 'passedit'])->name('pass.pengguna.edit');
    Route::get('/pass/update/{user}', [PenggunaController::class, 'passupdate'])->name('pass.pengguna.update');

    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.auth');

});

Route::group(['middleware' => ['auth', 'role:Administrator']], function() {

    // Pengguna
    Route::prefix('pengguna')->group(function() {
        Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('/administrator', [PenggunaController::class, 'administrator'])->name('pengguna.administrator');
        Route::get('/laboran', [PenggunaController::class, 'laboran'])->name('pengguna.laboran');
        Route::get('/pj', [PenggunaController::class, 'pj'])->name('pengguna.pj');
        Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::get('/edit/{user}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::post('/update/{user}', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::post('/store', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::get('/destroy/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    });

});
