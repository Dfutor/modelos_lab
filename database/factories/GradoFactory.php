<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradoFactory extends Factory
{
    protected $model = \App\Models\Grado::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'nivel' => $this->faker->randomElement(['Primaria', 'Secundaria', 'Preparatoria']),
        ];
    }
}