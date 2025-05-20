<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClaseEstudiante;

class ClaseEstudianteSeeder extends Seeder
{
    public function run()
    {
        ClaseEstudiante::factory()->count(30)->create();
    }
}