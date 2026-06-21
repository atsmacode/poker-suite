<?php

namespace Database\Factories;

use App\Enums\PotType;
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
            'type' => PotType::Main,
            'sequence' => 0,
        ];
    }

    public function side(int $sequence = 1): static
    {
        return $this->state(fn () => [
            'type' => PotType::Side,
            'sequence' => $sequence,
        ]);
    }
}
