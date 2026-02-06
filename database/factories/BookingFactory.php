<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'package_id' => Package::factory(),
            'time_slot_id' => TimeSlot::factory(),
            'customer_name' => fake()->word(),
            'customer_email' => fake()->word(),
            'customer_phone' => fake()->word(),
            'price_at_booking' => fake()->randomFloat(2, 0, 999999.99),
            'status' => fake()->randomElement(["confirmed","cancelled","completed"]),
        ];
    }
}
