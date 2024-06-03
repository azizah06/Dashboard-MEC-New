<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pkt_kelas>
 */
class Paket_KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Pkt_kelas::class;
    public function definition(): array
    {
        return [
            'kd_pkt_kelas' => fake()->unique()->randomNumber(8),
            'nama_kelas' => fake()->name,
            'harga' => fake()->randomFloat(2, 1000, 10000),

        ];

    }
}
