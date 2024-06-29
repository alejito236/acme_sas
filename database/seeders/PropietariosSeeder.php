<?php

namespace Database\Seeders;

use App\Models\propietario;
use Illuminate\Database\Seeder;

class PropietariosSeeder extends Seeder
{
   
    public function run(): void
    {
        propietario::factory()->count(10)->create();
    }
}
