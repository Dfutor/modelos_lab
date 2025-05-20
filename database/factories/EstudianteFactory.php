<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    protected $model = \App\Models\Estudiante::class;

    public function definition()
    {
        return [
            'id_persona' => \App\Models\Persona::all()->random()->id ?? 1,
        ];
    }
}