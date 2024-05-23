<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distribuidor>
 */
class DistribuidorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'DIS_nombre' => fake()->name(),
            'DIS_direccion' => fake()->address(),
            'DIS_telefono' => fake()->phoneNumber() ,
            'DIS_cif' => 'A12345678',
            'DIS_logo' => 'logo.png',


        ];
    }
}
