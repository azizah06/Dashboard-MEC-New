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
            'kd_siswa' => $this->faker->unique()->randomNumber(8),
            'nama' => $this->faker->name,
            'tgl_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->streetAddress,
            'no_telp' => $this->faker->randomNumber(9),
            'pkt_kelas_id' => rand(1,3)

        ];
    }
}
