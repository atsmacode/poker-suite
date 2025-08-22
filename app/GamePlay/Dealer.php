<?php

namespace App\GamePlay;

use App\Enums\Card;
use App\Models\Deck;

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
}