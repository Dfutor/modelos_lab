<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFactory extends Factory
{
    protected $model = \App\Models\Nota::class;

    public function definition()
    {
        return [
            'id_estudiante' => \App\Models\Estudiante::query()->inRandomOrder()->value('id') ?? 1,
            'id_clase' => \App\Models\Clase::query()->inRandomOrder()->value('id') ?? 1,
            'id_periodo' => \App\Models\Periodo::query()->inRandomOrder()->value('id') ?? 1,
            'valor' => $this->faker->randomFloat(2, 0, 10),
            'fecha' => $this->faker->date(),
        ];
    }
}