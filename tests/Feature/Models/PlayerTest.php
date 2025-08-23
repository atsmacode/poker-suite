<?php

use App\Models\Player;
use App\Models\PlayerAction;
use App\Models\Stack;
use App\Models\Table;
use App\Models\WholeCard;

test('a player can have whole cards', function() {
    $player = Player::factory()->has(WholeCard::factory(2))->create();

    $player->loadCount('wholeCards');

    expect($player->whole_cards_count)->toBe(2);
});

test('a player can have actions', function() {
    $player = Player::factory()->has(PlayerAction::factory(2))->create();

    $player->loadCount('playerActions');

    expect($player->player_actions_count)->toBe(2);
});

test('a player can have a stack', function() {
    $table = Table::factory()->create();
    $player = Player::factory()->has(
        Stack::factory(['amount' => 550, 'table_id' => $table->id])
    )->create();

    $stack = $player->stacks
        ->where('table_id', $table->id)
        ->first();

    expect($stack->amount)->toBe(550);
});