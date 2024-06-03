<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'kode_paket'=>'PH45',
                'nama_paket'=>'JavaScript',
                "harga"=> 300000
            ],
            [
                'kode_paket'=>'LA89',
                'nama_paket'=>'Laravel',
                "harga"=> 100000
            ],
            [
                'kode_paket'=>'U89',
                'nama_paket'=>'UI/UX',
                "harga"=> 80000
            ],
        ]);
    }
}
