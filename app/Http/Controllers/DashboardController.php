<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Mentor;
use App\Models\Pkt_kelas;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalMentor = Mentor::count();
        $totalPaket_Kelas = Pkt_kelas::count();
        $siswa = Siswa::orderBy('created_at', 'desc')->get();
        $totalPendapatan = Transaksi::sum('harga_bayar');
        $jadwal = Jadwal::all(); // contoh penggunaan model Jadwal


    // Lebih lanjut, Anda bisa memuat data lain yang diperlukan

    // Kirim data ke tampilan

        return view('dashboard', compact('jadwal','totalSiswa','totalMentor', 'totalPaket_Kelas', 'totalPendapatan', 'siswa'));
    }
}
