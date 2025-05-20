<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodoFactory extends Factory
{
    protected $model = \App\Models\Periodo::class;

    public function definition()
    {
        $inicio = $this->faker->dateTimeBetween('-2 years', 'now');
        $fin = (clone $inicio)->modify('+6 months');
        return [
            'nombre' => 'Periodo ' . $this->faker->word,
            'fecha_inicio' => $inicio->format('Y-m-d'),
            'fecha_fin' => $fin->format('Y-m-d'),
        ];
    }
}