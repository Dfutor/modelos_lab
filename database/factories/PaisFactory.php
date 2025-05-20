<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaisFactory extends Factory
{
    protected $model = \App\Models\Pais::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->country,
            'codigo' => $this->faker->unique()->countryCode,
        ];
    }
}