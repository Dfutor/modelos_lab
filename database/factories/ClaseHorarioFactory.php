<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseHorarioFactory extends Factory
{
    protected $model = \App\Models\ClaseHorario::class;

    public function definition()
    {
        return [
            'id_clase' => \App\Models\Clase::all()->random()->id ?? 1,
            'id_horario' => \App\Models\Horario::all()->random()->id ?? 1,
        ];
    }
}