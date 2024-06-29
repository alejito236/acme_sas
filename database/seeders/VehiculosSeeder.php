<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class VehiculosSeeder extends Seeder
{
   
    public function run(): void
    {
        Vehiculo::factory()->count(10)->create();
    }
}
