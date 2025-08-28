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
            'number' => fake()->unique()->numberBetween(1, 10),
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

    public function empty(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'player_id' => null,
            ];
        });
    }
}
