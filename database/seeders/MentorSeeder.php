<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentor')->insert([
            ['kd_mentor' => 2001,
            'nama' => 'Najma',
            'email' => 'najma@gmail.com',
            'no_telp' => '089765456543',
            'jenis_kelamin' => 'Perempuan',
            'pendidikan' => 'S1 Sistem Informasi',
            'alamat' => 'Surabaya']
        ]);
    }
}
