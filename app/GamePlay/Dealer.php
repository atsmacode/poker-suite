<?php

namespace App\GamePlay;

use App\Enums\Card;
use App\Models\Deck;
use App\Models\HandStreet;
use App\Models\HandStreetCard;
use App\Models\WholeCard;

class Dealer
{
    private Deck $deck;
    private Card $card;

    public function __construct()
    {
        $this->setDeck();
    }

    public function setDeck(?Deck $deck = null): self
    {
        $this->deck = $deck ?? Deck::new();

        return $this;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function getCards(): array
    {
        return $this->deck->cards;
    }

    public function shuffle(): self
    {
        $cards = $this->deck->cards;

        shuffle($cards);

        $this->deck->cards = $cards;

        return $this;
    }

    public function getCard(): Card
    {
        return $this->card;
    }

    public function pick(?Card $choice = null): self
    {
        $cards = $this->deck->cards;

        $cardId = $choice->value ?? array_shift($cards);

        $cards = $choice ? collect($cards)->reject(fn ($card) => $card === $choice->value) : $cards;

        $this->card = Card::tryFrom($cardId);

        $this->deck->cards = $cards;

        return $this;
    }

    public function saveDeck(int $handId): self
    {
        $this->deck = Deck::updateOrCreate(['hand_id' => $handId], ['cards' => $this->deck->cards]);

        return $this;
    }

    public function updateCards(int $handId): self
    {
        $deck = Deck::where('hand_id', $handId)->first();
        $deck->cards = $this->deck->cards;
        $deck->save();

        return $this;
    }

    public function loadSavedDeck(int $handId): self
    {
        $savedDeck = Deck::where('hand_id', $handId)->first();

        if ($savedDeck) {
            $this->deck = $savedDeck;
        }

        return $this;
    }

    public function dealTo(array $playerIds, int $cardCount, ?int $handId = null): self
    {
        $dealtCards = 0;

        while ($dealtCards < $cardCount) {
            foreach ($playerIds as $playerId) {
                WholeCard::create([
                    'player_id' => $playerId,
                    'card_id' => $this->pick()->getCard()->value,
                    'hand_id' => $handId ?? null,
                ]);
            }

            ++$dealtCards;
        }

        return $this->updateCards($handId);
    }

    public function dealStreetCards(int $handId, HandStreet $handStreet, int $cardCount): self
    {
        $dealtCards = 0;

        while ($dealtCards < $cardCount) {
            $card = $this->pick()->getCard();

            HandStreetCard::create([
                'card_id' => $card->value,
                'hand_street_id' => $handStreet->id,
            ]);

            ++$dealtCards;
        }

        return $this->updateCards($handId);
    }

    public function dealThisStreetCard(int $handId, Card $card, HandStreet $handStreet): self
    {
        $card = $this->pick($card)->getCard();

        HandStreetCard::create([
            'card_id' => $card->value,
            'hand_street_id' => $handStreet->id,
        ]);

        return $this->updateCards($handId);
    }
}