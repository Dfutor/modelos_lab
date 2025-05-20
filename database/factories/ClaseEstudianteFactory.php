<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseEstudianteFactory extends Factory
{
    protected $model = \App\Models\ClaseEstudiante::class;

    public function definition()
    {
        return [
            'id_clase' => \App\Models\Clase::all()->random()->id ?? 1,
            'id_estudiante' => \App\Models\Estudiante::all()->random()->id ?? 1,
        ];
    }
}