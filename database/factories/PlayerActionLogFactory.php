<?php

namespace Database\Factories;

use App\Enums\Action;
use App\Models\Hand;
use App\Models\Player;
use App\Models\PlayerAction;
use App\Models\TableSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerActionLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_action_id' => PlayerAction::factory(),
            'action_id' => Action::random()->value,
            'player_id' => Player::factory(),
            'hand_id' => Hand::factory(),
            'table_seat_id' => TableSeat::factory(),
            'bet_amount' => fake()->numberBetween(50, 150),
            'can_continue' => 0,
            'is_dealer' => 0,
            'big_blind' => fake()->boolean(),
            'small_blind' => fake()->boolean(),
        ];
    }
}
