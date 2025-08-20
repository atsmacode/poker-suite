<?php

use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\HandStreetCard;

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