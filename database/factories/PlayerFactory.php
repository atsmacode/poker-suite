<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->name(),
            'ai' => 0,
        ];
    }

    public function ai(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => null,
            'ai' => 1,
        ]);
    }
}
