<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Direccion;

class DireccionSeeder extends Seeder
{
    public function run()
    {
        Direccion::factory()->count(30)->create();
    }
}