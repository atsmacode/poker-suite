<?php

use App\Enums\Card;
use App\GamePlay\Dealer;
use App\Models\Deck;
use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\Player;

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

test('the dealer can save a deck', function() {
    $dealer = new Dealer;
    $hand = Hand::factory()->create();
    $handId = $hand->id;

    $dealer->saveDeck($handId);

    $this->assertDatabaseHas('decks', ['hand_id' => $handId]);
});

test('the dealer can update the cards in a deck', function() {
    $dealer = new Dealer;
    $hand = Hand::factory()->create();
    $handId = $hand->id;

    $dealer->saveDeck($handId);

    $deck = $dealer->getDeck();

    $dealer->shuffle()->updateCards($handId);

    $this->assertNotSame(
        $deck->cards,
        $dealer->loadSavedDeck($handId)->getDeck()
    );
});

test('the dealer can deal whole cards', function() {
    $dealer = new Dealer;
    $hand = Hand::factory()->create();

    $dealer->saveDeck($hand->id);

    $players = Player::factory(3)->create();

    $playerIds = $players->pluck('id')->toArray();

    $dealer->dealTo($playerIds, 2, $hand->id);

    $players->each(fn ($player) => expect($player->wholeCards->where('hand_id', $hand->id)->count())->toBe(2));
});

test('the dealer can deal street cards', function() {
    $dealer = new Dealer;
    $handStreet = HandStreet::factory()->create();
    $handId = $handStreet->hand->id;

    $dealer->saveDeck($handId);

    $dealer->dealStreetCards($handId, $handStreet, 3);

    expect($handStreet->handStreetCards->count())->toBe(3);
});

test('the dealer can deal a specific street card', function() {
    $dealer = new Dealer;
    $handStreet = HandStreet::factory()->create();
    $handId = $handStreet->hand->id;

    $dealer->saveDeck($handId);

    $dealer->dealThisStreetCard($handId, Card::AS, $handStreet);

    $this->assertContains(Card::AS->value, $handStreet->handStreetCards->pluck('card_id'));
});
