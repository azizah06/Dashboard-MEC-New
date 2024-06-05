<?php

use App\Http\Controllers\jadwalController;
use App\Http\Controllers\mentorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\transaksiController;

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

Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
Route::get('profile',[profilController::class,'index'])->name('profile');
Route::resource('siswa', siswaController::class);
Route::resource('jadwal', jadwalController::class);
Route::resource('transaksi', transaksiController::class);
Route::resource('Mentor', mentorController::class);


