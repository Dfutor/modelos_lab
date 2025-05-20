<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseFactory extends Factory
{
    protected $model = \App\Models\Clase::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'id_sede' => \App\Models\Sede::query()->inRandomOrder()->value('id') ?? 1,
            'id_grado' => \App\Models\Grado::query()->inRandomOrder()->value('id') ?? 1,
            'id_aula' => \App\Models\Aula::query()->inRandomOrder()->value('id') ?? 1,
        ];
    }
}