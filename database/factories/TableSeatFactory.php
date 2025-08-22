<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableSeatFactory extends Factory
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
            'number' => 1,
            'active' => 1,
            'can_continue' => 0,
            'is_dealer' => 0,
            'small_blind' => fake()->boolean(),
            'big_blind' => fake()->boolean(),
        ];
    }

    public function number(int $number): Factory
    {
        return $this->state(function (array $attributes) use ($number) {
            return [
                'number' => $number,
            ];
        });
    }

    public function canContinue(bool $canContinue = false): Factory
    {
        return $this->state(function (array $attributes) use ($canContinue) {
            return [
                'can_continue' => (int) $canContinue,
            ];
        });
    }

    public function isDealer(bool $isDealer = false): Factory
    {
        return $this->state(function (array $attributes) use ($isDealer) {
            return [
                'is_dealer' => (int) $isDealer,
            ];
        });
    }
}
