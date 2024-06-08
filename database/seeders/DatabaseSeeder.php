<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MentorSeeder::class,
            Pkt_kelasSeeder::class,
            SiswaSeeder::class,
            SarpraSeeder::class,
            JadwalSeeder::class,

        ]);
    }
}
