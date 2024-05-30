<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'kd_siswa' => 1001,
                'nama' => 'Nur Azizah R',
                'tgl_lahir' => '2021/10/10',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Surabaya'
            ]
            ]);
    }
}
