<?php

namespace Database\Factories;

use App\Enums\GameMode;
use App\Enums\GameStyle;
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
            'game_style_id' => GameStyle::PLHE->value,
            'game_mode_id' => GameMode::TEST->value,
        ];
    }
}
