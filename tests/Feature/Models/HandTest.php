<?php

use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\HandStreetCard;
use App\Models\Pot;

test('a hand can have street cards', function () {
    $hand = Hand::factory()
        ->has(
            HandStreet::factory()->has(
                HandStreetCard::factory(3)
            )
        )
        ->create();

    $hand->loadCount('handStreetCards');

    expect($hand->hand_street_cards_count)->toBe(3);
});

test('a hand can have a pot', function() {
    $hand = Hand::factory()->has(Pot::factory(['amount' => 750]))->create();

    expect($hand->pot->amount)->toBe(750);
});