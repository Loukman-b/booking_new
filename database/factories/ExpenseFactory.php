<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(),
            'amount' => fake()->randomFloat(2, 0, 999999.99),
            'expense_date' => fake()->date(),
            'created_by' => User::factory(),
        ];
    }
}
