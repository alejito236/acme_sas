<?php

namespace Database\Seeders;

use App\Models\Conductor;
use Illuminate\Database\Seeder;

class ConductoresSeeder extends Seeder
{
 
    public function run(): void
    {
        Conductor::factory()->count(10)->create();
    }
}
