<?php

use App\Models\Player;
use App\Models\Table;

test('a table can have players', function() {
    $players = Player::factory(6)->create();
    $table = Table::factory()
        ->hasAttached($players, fn() => [
            'number' => fake()->unique()->numberBetween(1, 10),
            'can_continue' => 0,
            'is_dealer' => 0,
        ])
        ->create();

    $table->loadCount('players');

    expect($table->players_count)->toBe(6);
});