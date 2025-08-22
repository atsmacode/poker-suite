<?php

use App\Models\Deck;
use App\Models\Hand;

test('a new deck has 52 cards', function() {
    $deck = Deck::new();

    expect(count($deck->cards))->toBe(52);
});

test('a deck belongs to a hand', function() {
    $hand = Hand::factory()->create();
    $deck = Deck::factory()->for($hand)->create();

    expect($deck->hand_id)->toBe($hand->id);
});