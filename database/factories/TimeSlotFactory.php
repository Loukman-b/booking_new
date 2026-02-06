<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'package_id' => Package::factory(),
            'start_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(),
            'status' => fake()->randomElement(["available","booked","cancelled"]),
        ];
    }
}
