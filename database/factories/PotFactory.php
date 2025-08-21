<?php

namespace Database\Factories;

use App\Models\Hand;
use Illuminate\Database\Eloquent\Factories\Factory;

class PotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hand_id' => Hand::factory(),
            'amount' => fake()->numberBetween(100, 1000),
        ];
    }
}
