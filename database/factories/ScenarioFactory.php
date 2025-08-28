<?php

namespace Database\Factories;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScenarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'game_id' => Game::factory(),
            'name' => 'Scenario #' . fake()->unique()->numberBetween(1, 100),
            'draft' => 1,
            'expires_at' => Carbon::now()->addDay(),
        ];
    }
}
