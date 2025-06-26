<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(4),
            'pengarang' => $this->faker->name(),
            'cover' => '',
            'tahun_terbit' => $this->faker->year,
            'kategori_id' =>$this->faker->randomElement([1, 2, 5, 6]), //pkai random karena id ny lompat" tdak berurutan
             'penerbit_id' => $this->faker->randomElement([1, 4, 5, 6]),

        ];
    }
}
