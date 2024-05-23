<?php

namespace Database\Factories;

use App\Models\ClienteTipo;
use App\Models\Distribuidor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [




            'CLI_nombre' => fake()->name(),
            'CLI_direccion' => fake()->address(),
            'CLI_telefono' => fake()->phoneNumber(),
            'CLI_email' => fake()->email(),
            'CLI_cif' => fake()->name(),
            // 'CLI_distribuidor_id' => Distribuidor::where('DIS_id', 2)->first()->DIS_id, // Distribuidor aleatorio
            'CLI_tipo_id' => ClienteTipo::inRandomOrder()->value('CLI_TIP_id'), // Tipo de cliente aleatorio







        ];
    }
}
