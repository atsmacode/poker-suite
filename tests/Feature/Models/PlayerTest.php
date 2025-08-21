<?php

use App\Models\Player;
use App\Models\WholeCard;

test('a player can have whole cards', function() {
    $player = Player::factory()->has(WholeCard::factory(2))->create();

    $player->loadCount('wholeCards');

    expect($player->whole_cards_count)->toBe(2);
});