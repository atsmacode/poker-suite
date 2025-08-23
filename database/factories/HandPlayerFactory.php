<?php

namespace Database\Factories;

use App\Enums\Card;
use App\Models\Hand;
use App\Models\Player;
use App\Models\TableSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class HandPlayerFactory extends Factory
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
            'hand_id' => Hand::factory(),
            'table_seat_id' => TableSeat::factory(),
            'is_dealer' => 0,
            'small_blind' => fake()->boolean(),
            'big_blind' => fake()->boolean(),
        ];
    }
}
