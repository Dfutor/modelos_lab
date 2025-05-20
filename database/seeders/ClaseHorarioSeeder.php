<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClaseHorario;

class ClaseHorarioSeeder extends Seeder
{
    public function run()
    {
        ClaseHorario::factory()->count(30)->create();
    }
}