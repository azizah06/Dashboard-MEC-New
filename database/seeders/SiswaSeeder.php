<?php

namespace Database\Seeders;

use App\Models\Siswa;
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
            'kd_siswa' => '1200',
            'nama' => 'Nur Azizah Rosidah',
            'tgl_lahir' => '2020-05-01',
            'no_telp' => '0895077745',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Surabaya',
            'pkt_kelas_id' => '1'
            ]
            ]);
    }
}
