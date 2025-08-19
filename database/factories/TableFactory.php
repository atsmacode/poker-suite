<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'seats' => 6,
        ];
    }

    public function seats(int $count): Factory
    {
        return $this->state(function (array $attributes) use ($count) {
            return [
                'seats' => $count,
            ];
        });
    }
}
