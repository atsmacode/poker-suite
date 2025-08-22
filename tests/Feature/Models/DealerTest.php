<?php

use App\Enums\Card;
use App\GamePlay\Dealer;
use App\Models\Deck;

test('the dealer has a deck', function() {
    $dealer = new Dealer;

    expect($dealer->getDeck() instanceof Deck)->toBe(true);
});

test('the dealer can shuffle the deck', function() {
    $dealer = new Dealer;
    $cards = $dealer->getCards();

    $this->assertNotSame($cards, $dealer->shuffle()->getCards());
});

test('the dealer can pick the next card', function() {
    $dealer = new Dealer;
    $cards = $dealer->shuffle()->getCards();

    $nextCard = Card::tryFrom($cards[0]);

    $this->assertSame($nextCard, $dealer->pick()->getCard());
});

test('a picked card is no longer in the deck', function() {
    $dealer = new Dealer;
    $card = Card::AS;

    $this->assertNotContains($card->value, $dealer->pick($card)->getCards());
});