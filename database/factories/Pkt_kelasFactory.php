<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pkt_kelas>
 */
class Pkt_kelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_pkt_kelas' =>$this->faker->unique()->randomNumber(8),
            'nama_kelas' => $this->faker->unique()->randomElement(['SKD Kedinasan', 'SBMPTN', 'English Class']),
            'harga' => $this->faker->randomFloat(2, 1000, 10000),

        ];

    }
}
