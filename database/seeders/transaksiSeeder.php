<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class transaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'kode_bayar'=>'AB32',
                'siswass_id'=>2,
                'kelas_id'=>3,
                'tanggal_bayar'=>'2024-04-04',
                // 'bukti_bayar'=>'819921'
            ]
        ]);
    }
}
