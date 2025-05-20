<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SedeFactory extends Factory
{
    protected $model = \App\Models\Sede::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'id_direccion' => \App\Models\Direccion::query()->inRandomOrder()->value('id'), 
        ];
    }
}