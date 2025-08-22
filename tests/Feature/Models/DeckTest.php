<?php

use App\Models\Deck;

test('a new deck has 52 cards', function() {
    $deck = Deck::new();

    expect(count($deck->cards))->toBe(52);
});