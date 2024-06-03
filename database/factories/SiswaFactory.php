<?php

namespace Database\Factories;

use App\Models\Pkt_kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_pkt_kelas' => fake()->unique()->randomNumber(8),

            'nama' => fake()->name,
            'tgl_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => fake()->address,
            'no_telp' => fake()->randomNumber(9)

        ];
    }
}
