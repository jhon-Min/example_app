<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'due_date' => Carbon::now()->addDays($this->faker->numberBetween(1, 30)),
            'client_id' => rand(1, 20),
            'description' => $this->faker->sentence(),
        ];
    }
}
