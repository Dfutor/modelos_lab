<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sede;
use App\Models\Aula;


class AulaFactory extends Factory
{
    protected $model = \App\Models\Aula::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Aula Magna', 'Laboratorio de Cómputo', 'Salón Multiusos']) . ' ' . $this->faker->numberBetween(1, 10),
            'id_sede' => \App\Models\Sede::all()->random()->id,
            'codigo' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'capacidad' => $this->faker->numberBetween(
                    $this->faker->randomElement([20, 30, 50]),
                    $this->faker->randomElement([60, 80, 100])
                ),
            'tipo'=> $this->faker->randomElement(['laboratorio', 'aula', 'auditorio']),
            'descripcion'=> $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
