<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clase;

class ClaseSeeder extends Seeder
{
    public function run()
    {
        Clase::factory()->count(20)->create();
    }
}