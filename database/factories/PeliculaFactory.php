<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "titulo" => $this->faker->name(),
            'anyo' => $this->faker->numberBetween(1950, 2023),
            'duracion' => $this->faker->numberBetween(60, 150)
        ];
    }
}
