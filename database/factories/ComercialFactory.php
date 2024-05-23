<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comercial>
 */
class ComercialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'COM_nombre' => fake()->company(),
            'COM_direccion' => fake()->address(),
            'COM_telefono' => fake()->phoneNumber(),
            'COM_cif' => fake()->regexify('[A-Z]{1}[0-9]{8}'),
            'COM_logo' => fake()->imageUrl(),

        ];
    }
}
