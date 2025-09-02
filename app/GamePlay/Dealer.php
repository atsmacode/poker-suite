<?php

namespace App\GamePlay;

use App\Enums\Card;
use App\Models\Deck;
use App\Models\HandStreet;
use App\Models\HandStreetCard;
use App\Models\HoleCard;
use Illuminate\Database\Eloquent\Collection;

class Dealer
{
    private Deck $deck;
    private Card $card;

    public function __construct(?int $handId = null)
    {
        $this->setDeck($handId);
    }

    public function setDeck(?int $handId = null): self
    {
        $this->deck = Deck::new($handId);

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

        $cards = $choice ? collect($cards)->reject(fn ($card) => $card === $cardId) : $cards;

        $this->card = Card::tryFrom($cardId);

        $this->deck->cards = $cards;

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

    public function dealTo(Collection $players, int $cardCount, ?int $handId = null): self
    {
        $dealtCards = 0;

        while ($dealtCards < $cardCount) {
            foreach ($players as $player) {
                HoleCard::create([
                    'player_id' => $player->id,
                    'card_id' => $this->pick()->getCard()->value,
                    'hand_id' => $handId ?? null,
                ]);
            }

            ++$dealtCards;
        }

        return $this->updateCards($handId);
    }

    public function dealStreetCards(HandStreet $handStreet, int $cardCount): self
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

        return $this->updateCards($handStreet->hand->id);
    }

    public function dealThisStreetCard(Card $card, HandStreet $handStreet): self
    {
        $card = $this->pick($card)->getCard();

        HandStreetCard::create([
            'card_id' => $card->value,
            'hand_street_id' => $handStreet->id,
        ]);

        return $this->updateCards($handStreet->hand->id);
    }
}