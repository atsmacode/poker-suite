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
}
