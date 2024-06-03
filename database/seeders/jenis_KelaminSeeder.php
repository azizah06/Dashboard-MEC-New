<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class jenis_KelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_kelamins')->insert([
        [
            'kode'=> 'L',
            'nama'=>'Pria'
        ],
        [
            'kode'=> 'P' ,
            'nama'=>'Wanita'
        ],
        ]);
    }
}
