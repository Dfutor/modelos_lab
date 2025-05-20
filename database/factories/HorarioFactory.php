<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    protected $model = \App\Models\Horario::class;

    public function definition()
    {
        return [
            'dia' => $this->faker->dayOfWeek,
            'hora_inicio' => $this->faker->time('H:i'),
            'hora_fin' => $this->faker->time('H:i'),
        ];
    }
}