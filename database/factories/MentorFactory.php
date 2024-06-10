<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_mentor' => $this->faker->unique()->numberBetween(1000, 9999),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telp' => $this->faker->randomNumber(9),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'pendidikan' => $this->faker->randomElement(['S1 Sistem Informasi', 'S1 Teknik Informatika', 'S1 Ilmu Komputer']),
            'alamat' => $this->faker->city(),
        ];
    }
}
