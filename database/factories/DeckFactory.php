<?php

namespace Database\Factories;

use App\Enums\Card;
use App\Models\Hand;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cards' => Card::toIds(),
            'hand_id' => Hand::factory(),
        ];
    }
}
