<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'amount' => fake()->randomFloat(2, 0, 999999.99),
            'payment_method' => fake()->word(),
            'paid_at' => fake()->dateTime(),
        ];
    }
}
