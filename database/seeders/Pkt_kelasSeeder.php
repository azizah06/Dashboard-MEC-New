<?php

namespace Database\Seeders;

use App\Models\Pkt_kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pkt_kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pkt_kelas')->insert([
            [
            'kd_pkt_kelas' => '1200',
            'nama_kelas' => 'SKD Kedinasan online',
            'harga' => '50000'

            ]
            ]);
    }
}

