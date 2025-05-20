<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClaseProfesor;

class ClaseProfesorSeeder extends Seeder
{
    public function run()
    {
        ClaseProfesor::factory()->count(30)->create();
    }
}