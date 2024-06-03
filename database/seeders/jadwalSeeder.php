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
                'kode_jadwal'=>'BA312',
                'mentors_id'=> 4,
                'sarprass_id'=>1,
                'Kelass'=>2,
                'hari'=>'2024-06-04',
                'jam_mulai'=>'08.00',
                'jam_akhir'=>'10.30'
            ]
        ]);
    }
}
