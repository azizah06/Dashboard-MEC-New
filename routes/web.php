<?php

use App\Http\Controllers\AuthController;
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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('user');

// Rute untuk Siswa
Route::resource('/siswa', SiswaController::class)->middleware('user');
// Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');

// Rute untuk Mentor
Route::resource('/mentor', MentorController::class)->middleware('user');
// Route::get('/mentor', [MentorController::class, 'index'])->name('mentor');

// Rute untuk Paket Kelas
Route::resource('/paket_kelas', PaketKelasController::class)->middleware('user');
// Route::get('/paket_kelas', [PaketKelasController::class, 'index'])->name('paket_kelas');

// Rute untuk Jadwal
Route::resource('/jadwal', JadwalController::class)->middleware('user');
// Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

// Rute untuk Transaksi
Route::resource('/transaksi', TransaksiController::class)->middleware('user');

// Rute untuk Sarana Prasarana
Route::resource('/sarpra', SarpraController::class)->middleware('user');

// Rute untuk Sarana Prasarana
Route::resource('/profile', ProfileController::class)->middleware('user');

// Route::get('exportExcel', [SiswaController::class, 'exportExcel'])->name('siswa.exportExcel');
Route::get('/siswa_exportExcel', [SiswaController::class, 'makeExcle'])->name('siswa.exportExcels');
Route::get('/mentor_exportExcel', [MentorController::class, 'makeExcle'])->name('mentor.exportExcels');
Route::get('/pkt_kelas_exportExcel', [PaketKelasController::class, 'makeExcle'])->name('paket_kelas.exportExcels');
Route::get('/jadwal_exportExcel', [JadwalController::class, 'makeExcle'])->name('jadwal.exportExcels');
Route::get('/transaksi_exportExcel', [TransaksiController::class, 'makeExcle'])->name('transaksi.exportExcels');
Route::get('/sarpra_exportExcel', [SarpraController::class, 'makeExcle'])->name('sarpra.exportExcels');

Route::get('/siswa_exportPdf', [SiswaController::class, 'makePDF'])->name('siswa.exportPdf');

Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan user biasa maka akan diarahkan ke UserController
Route::group(['middleware' => ['auth']], function () {
});
