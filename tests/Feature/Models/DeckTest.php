<?php

use App\Models\Deck;

test('a deck has 52 cards', function() {
    $deck = Deck::factory()->create();

    expect(count($deck->cards))->toBe(52);
});