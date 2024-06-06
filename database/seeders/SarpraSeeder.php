<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sarpra;

class SarpraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sarpra')->insert([
            [
            'kd_sarpra' => '0001',
            'nama_ruangan' => 'Ruangan 01',
            'kapasitas' => 23,
            'jmlh_baik' => 2,
            'jmlh_rusak' => 2,
            'meja_mentor' => 1,
            'kursi_mentor' => 1,
            'kursi_meja_siswa' => 1,
            'kipas' => 1,
            'papan_tulis' => 1,
            'keterangan' => 'Kipas rusak, kursi rusak 1',
            ]
            ]);
    }
}
