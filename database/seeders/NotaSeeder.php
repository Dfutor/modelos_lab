<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nota;

class NotaSeeder extends Seeder
{
    public function run()
    {
        Nota::factory()->count(50)->create();
    }
}