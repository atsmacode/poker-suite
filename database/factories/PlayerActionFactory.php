<?php

namespace Database\Factories;

use App\Enums\Action;
use App\Models\Hand;
use App\Models\HandPlayer;
use App\Models\HandStreet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'action_id' => Action::random()->value,
            'hand_player_id' => HandPlayer::factory(),
            'hand_street_id' => HandStreet::factory(),
            'hand_id' => Hand::factory(),
            'bet_amount' => fake()->numberBetween(50, 150),
            'sequence' => fake()->unique()->numberBetween(1, 20),
        ];
    }
}
