<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentor')->insert([
            [
                'kode_mentor'=>'AKB',
                'nama'=>'Aru Maul',
                'email'=> 'game@game.com',
                'no_telepon'=>'081332003',
                'jenis_kelamin'=>'Pria',
                'pendidikan'=>'Sarjana',
                'alamat'=>'jalan durian runtuh'
            ],
            [
                'kode_mentor'=>'ABS',
                'nama'=>'Ahmad Ridho',
                'email'=> 'game@admin.com',
                'no_telepon'=>'088238382910',
                'jenis_kelamin'=>'Pria',
                'pendidikan'=>'Sarjana',
                'alamat'=>'jalanin aja dulu'
            ],
            [
                'kode_mentor'=>'BAP',
                'nama'=>'Bintang Andi Perkoso',
                'email'=> 'main@admin.com',
                'no_telepon'=>'0832399443',
                'jenis_kelamin'=>'Pria',
                'pendidikan'=>'Sarjana',
                'alamat'=>'jalan margorejo'
            ],
            [
                'kode_mentor'=>'RAN',
                'nama'=>'Resti Anggraini',
                'email'=> 'main@gmail.com',
                'no_telepon'=>'089234493',
                'jenis_kelamin'=>'Wanita',
                'pendidikan'=>'Magister',
                'alamat'=>'jalan Merr'
            ],
        ]);
    }
}
