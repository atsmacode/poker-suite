<?php

namespace Database\Factories;

use App\Enums\Mode;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'table_id' => Table::factory(),
            'game_style_id' => 1,
            'game_mode_id' => Mode::TEST->value,
        ];
    }
}
