<?php

namespace Database\Factories;

use App\Enums\Card;
use App\Models\Hand;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class WholeCardFactory extends Factory
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
            'card_id' => Card::random()->toArray()['id']
        ];
    }
}
