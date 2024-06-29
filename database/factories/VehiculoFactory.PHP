<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->unique()->bothify('???-####'),
            'color' => $this->faker->safeColorName,
            'marca' => $this->faker->company,
            'tipo' => $this->faker->randomElement(['particular', 'publico']),
            'conductores_id' => \App\Models\Conductor::factory(), 
            'propietarios_id' => \App\Models\Propietario::factory(), 
        ];
    }
}
