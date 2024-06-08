<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table ('jadwal')->insert([
            [
                'kd_jadwal'=>'BA312',
                'mentor_id'=> 4,
                'sarpra_id'=>1,
                'pkt_kelas_id'=>2,
                'hari'=>'Senin',
                'jam_mulai'=>'08.00',
                'jam_akhir'=>'10.30'
            ]
        ]);
    }
}
