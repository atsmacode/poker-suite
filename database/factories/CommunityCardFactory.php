<?php

namespace Database\Factories;

use App\Models\HandStreet;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hand_street_id' => HandStreet::factory(),
            'card_id' => rand(1, 52),
        ];
    }
}
