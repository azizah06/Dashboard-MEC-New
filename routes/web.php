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
Route::resource('/jadwal', JadwalController::class);
// Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

// Rute untuk Transaksi
Route::resource('/transaksi', TransaksiController::class);

// Rute untuk Sarana Prasarana
Route::resource('/sarpra', SarpraController::class);

// Rute untuk Sarana Prasarana
Route::resource('/profile', ProfileController::class);

// Route::get('exportExcel', [SiswaController::class, 'exportExcel'])->name('siswa.exportExcel');
Route::get('/siswa_exportExcel', [SiswaController::class, 'makeExcle'])->name('siswa.exportExcels');
Route::get('/mentor_exportExcel', [MentorController::class, 'makeExcle'])->name('mentor.exportExcels');
Route::get('/pkt_kelas_exportExcel', [PaketKelasController::class, 'makeExcle'])->name('paket_kelas.exportExcels');
Route::get('/jadwal_exportExcel', [JadwalController::class, 'makeExcle'])->name('jadwal.exportExcels');
Route::get('/transaksi_exportExcel', [TransaksiController::class, 'makeExcle'])->name('transaksi.exportExcels');
Route::get('/sarpra_exportExcel', [SarpraController::class, 'makeExcle'])->name('sarpra.exportExcels');

// Route::get('/exportExcel', [SiswaController::class, 'exportExcel'])->name('exportExcels');

// Route::get('exportExcel', [SarpraController::class, 'exportExcel'])->name('sarpra.exportExcel');
// Route::get('exportExcel', [MentorController::class, 'exportExcel'])->name('mentor.exportExcel');
// Route::get('exportExcel', [JadwalController::class, 'exportExcel'])->name('jadwal.exportExcel');
// Route::get('exportExcel', [PaketKelasController::class, 'exportExcel'])->name('pkt_kelas.exportExcel');
// Route::get('exportExcel', [TransaksiController::class, 'exportExcel'])->name('transaksi.exportExcel');
