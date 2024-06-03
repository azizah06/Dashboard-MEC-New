<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SarprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sarpras')->insert([
            [
                'kode_sarpras'=>'A122',
                'kode_ruang'=>'2.03',
                'nama_ruang'=>'Lab. Jaringan'
            ],
            [
                'kode_sarpras'=>'A223',
                'kode_ruang'=>'1.10',
                'nama_ruang'=>'Ruang Kelas'
            ],
        ]);
    }
}
