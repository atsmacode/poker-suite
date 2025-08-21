<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class StackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_id' => Player::factory(),
            'table_id' => Table::factory(),
            'amount' => fake()->numberBetween(100, 1000),
        ];
    }
}
