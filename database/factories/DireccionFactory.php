<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    protected $model = \App\Models\Direccion::class;

    public function definition()
    {
        return [
            'calle' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'id_ciudad' => \App\Models\Ciudad::query()->inRandomOrder()->value('id') ?? 1,
        ];
    }
}