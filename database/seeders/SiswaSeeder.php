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
                'nama'=> 'azizah',
                'tanggal_lahir'=> '2004-06-26',
                'no_telp'=>'08321223454',
                'jenisKelamins'=>2,
                'alamat'=>'Karah Agung', 
            ],
            [
                'nama'=> 'Arya maulana',
                'tanggal_lahir'=> '2002-03-08',
                'no_telp'=>'083434343432',
                'jenis_kelamin_id'=> 1,
                'alamat'=>'Pasuruan'
            ],
            [
                'nama'=> 'Najma Makassar',
                'tanggal_lahir'=> '2002-06-24',
                'no_telp'=>'0844332233',
                'jenis_kelamin_id'=> 2,
                'alamat'=>'Ambon'
            ],
            [
                'nama'=> 'Faiq Rizki',
                'tanggal_lahir'=> '2004-04-05',
                'no_telp'=>'084566543344',
                'jenis_kelamin_id'=> 1,
                'alamat'=>'Ketintang'
            ],
            ]);
    }
}
