<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseProfesorFactory extends Factory
{
    protected $model = \App\Models\ClaseProfesor::class;

    public function definition()
    {
        return [
            'id_clase' => \App\Models\Clase::all()->random()->id ?? 1,
            'id_profesor' => \App\Models\Profesor::all()->random()->id ?? 1,
        ];
    }
}