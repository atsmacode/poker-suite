<?php

use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\CommunityCard;
use App\Models\Pot;

test('a hand can have street cards', function () {
    $hand = Hand::factory()
        ->has(
            HandStreet::factory()->has(
                CommunityCard::factory(3)
            )
        )
        ->create();

    $hand->loadCount('communityCards');

    expect($hand->community_cards_count)->toBe(3);
});

test('a hand can have a pot', function() {
    $hand = Hand::factory()->has(Pot::factory(['amount' => 750]))->create();

    expect($hand->pot->amount)->toBe(750);
});