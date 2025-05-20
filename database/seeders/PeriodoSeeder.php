<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodoSeeder extends Seeder
{
    public function run()
    {
        Periodo::factory()->count(5)->create();
    }
}