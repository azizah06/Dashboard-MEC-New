<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        SiswaSeeder::class,
        jenis_KelaminSeeder::class,
        jadwalSeeder::class,
        KelasSeeder::class,
        mentorSeeder::class,
        SarprasSeeder::class
       ]);
    }
}
