<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persona;

class PersonaFactory extends Factory
{
    protected $model = \App\Models\Persona::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2005-01-01'),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->safeEmail(),
            'rol' => $this->faker->randomElement(['estudiante', 'profesor', 'administrativo']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
