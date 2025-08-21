<?php

use App\Models\Player;
use App\Models\PlayerAction;
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