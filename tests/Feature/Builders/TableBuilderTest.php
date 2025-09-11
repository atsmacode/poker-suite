<?php

use App\Builders\TableBuilder;
use App\Models\Player;
use App\Models\TableSeat;

test('it can add a random player to a seat', function() {
    $tableSeat = TableSeat::factory()->empty()->create();
    $builder = new TableBuilder;

    $this->assertNull($tableSeat->player_id);

    $builder->addPlayer($tableSeat);

    $this->assertNotNull($tableSeat->player_id);
});

test('it can add a specific player to a seat', function() {
    $tableSeat = TableSeat::factory()->empty()->create();
    $player = Player::factory()->create();
    $builder = new TableBuilder;

    $this->assertNull($tableSeat->player_id);

    $builder->addPlayer($tableSeat, $player);

    $this->assertEquals($tableSeat->player_id, $player->id);
});
