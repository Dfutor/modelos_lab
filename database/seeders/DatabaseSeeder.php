<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisSeeder::class,
            CiudadSeeder::class,
            DireccionSeeder::class,
            SedeSeeder::class,
            AulaSeeder::class,
            GradoSeeder::class,
            ProfesorSeeder::class,
            PersonaSeeder::class,
            EstudianteSeeder::class,
            HorarioSeeder::class,
            ClaseSeeder::class,
            ClaseEstudianteSeeder::class,
            ClaseHorarioSeeder::class,
            ClaseProfesorSeeder::class,
            PeriodoSeeder::class,
            NotaSeeder::class,
        ]);
    }
}
