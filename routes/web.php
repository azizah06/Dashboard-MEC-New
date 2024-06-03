<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PaketKelasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SarpraController;
use App\Http\Controllers\ProfileController;

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

// Rute untuk Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rute untuk Siswa
Route::resource('/siswa', SiswaController::class);
// Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');

// Rute untuk Mentor
Route::resource('/mentor', MentorController::class);
// Route::get('/mentor', [MentorController::class, 'index'])->name('mentor');

// Rute untuk Paket Kelas
Route::resource('/paket_kelas', PaketKelasController::class);
// Route::get('/paket_kelas', [PaketKelasController::class, 'index'])->name('paket_kelas');

// Rute untuk Jadwal
Route::resource('jadwal', JadwalController::class);
// Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

// Rute untuk Transaksi
Route::resource('/transaksi', TransaksiController::class);

// Rute untuk Sarana Prasarana
Route::resource('/sarpra', SarpraController::class);

// Rute untuk Profile
Route::resource('/profile', ProfileController::class);
