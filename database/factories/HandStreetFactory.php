<?php

namespace Database\Factories;

use App\Enums\Street;
use App\Models\Hand;
use Illuminate\Database\Eloquent\Factories\Factory;

class HandStreetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street_id' => Street::random()->toArray()['id'],
        ];
    }
}
