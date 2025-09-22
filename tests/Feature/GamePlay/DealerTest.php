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

test('the dealer can save a deck for a hand', function() {
    $hand = Hand::factory()->create();

    new Dealer($hand);

    $this->assertDatabaseHas('decks', ['hand_id' => $hand->id]);
});

test('the dealer can update the cards in a deck', function() {
    $hand = Hand::factory()->create();
    $handId = $hand->id;
    $dealer = new Dealer($hand);

    $deck = $dealer->getDeck();

    $dealer->shuffle()->updateCards($handId);

    $this->assertNotSame(
        $deck->cards,
        $dealer->loadSavedDeck($handId)->getDeck()
    );
});

test('the dealer can deal hole cards', function() {
    $hand = Hand::factory()->create();
    $dealer = new Dealer($hand);

    $players = Player::factory(3)->create();

    $dealer->dealHoleCards($players, 2, false, $hand);

    $players->each(fn ($player) => expect($player->holeCards->where('hand_id', $hand->id)->count())->toBe(2));
});

test('the dealer can deal a specific hole card', function() {
    $hand = Hand::factory()->create();
    $dealer = new Dealer($hand);

    $player = Player::factory()->create();

    $dealer->dealThisHoleCard($player, Card::AS, false, $hand);

    $this->assertContains(Card::AS->value, $player->holeCards->pluck('card_id'));
});

test('the dealer can deal street cards', function() {
    $handStreet = HandStreet::factory()->create();
    $dealer = new Dealer($handStreet->hand);

    $dealer->dealCommunityCards($handStreet, 3);

    expect($handStreet->communityCards->count())->toBe(3);
});

test('the dealer can deal a specific street card', function() {
    $handStreet = HandStreet::factory()->create();
    $dealer = new Dealer($handStreet->hand);

    $dealer->dealThisCommunityCard(Card::AS, $handStreet);

    $this->assertContains(Card::AS->value, $handStreet->communityCards->pluck('card_id'));
});
