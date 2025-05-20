<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model = \App\Models\Profesor::class;

    public function definition()
    {
        return [
            'id_persona' => \App\Models\Persona::factory(),
            'enfoque' => $this->faker->randomElement(['Matemáticas', 'Ciencias', 'Historia', 'Lengua']),
        ];
    }
}