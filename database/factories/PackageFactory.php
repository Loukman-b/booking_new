<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 0, 999999.99),
            'duration_minutes' => fake()->numberBetween(-10000, 10000),
            'active' => fake()->boolean(),
        ];
    }
}
