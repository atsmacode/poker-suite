<?php

namespace App\GamePlay;

use App\Enums\Card;
use App\Models\Deck;
use App\Models\HandStreet;
use App\Models\CommunityCard;
use App\Models\Hand;
use App\Models\HoleCard;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class Dealer
{
    private Deck $deck;
    private Card $card;

    public function __construct(?Hand $hand = null)
    {
        $this->forHand($hand);
    }

    public function forHand(?Hand $hand = null): self
    {
        $this->deck = Deck::new($hand);
        $this->shuffle();

        return $this;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function getCards(): Collection
    {
        return $this->deck->deckCards()->get();
    }

    public function shuffle(): self
    {
        $cards     = $this->deck->remainingCards()->get();
        $positions = collect(range(1, $cards->count()))->shuffle()->values();

        $cards->each(fn ($deckCard, int $index) => $deckCard->update(['position' => $positions[$index]]));

        return $this;
    }

    public function getCard(): Card
    {
        return $this->card;
    }

    public function pick(?Card $choice = null): self
    {
        $deckCard = $choice
            ? $this->deck->remainingCards()->where('card_id', $choice->value)->firstOrFail()
            : $this->deck->remainingCards()->first();

        $this->card = Card::from($deckCard->card_id);
        $deckCard->update(['dealt' => true]);

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

    public function dealHoleCards(Collection $players, int $cardCount, bool $faceUp, ?Hand $hand = null): self
    {
        $dealtCards = 0;

        while ($dealtCards < $cardCount) {
            foreach ($players as $player) {
                HoleCard::create([
                    'player_id' => $player->id,
                    'card_id'   => $this->pick()->getCard()->value,
                    'face_up'   => $faceUp,
                    'hand_id'   => $hand?->id,
                ]);
            }

            ++$dealtCards;
        }

        return $this;
    }

    public function dealThisHoleCard(Player $player, Card $card, bool $faceUp, ?Hand $hand = null): self
    {
        HoleCard::create([
            'player_id' => $player->id,
            'card_id'   => $card->value,
            'face_up'   => $faceUp,
            'hand_id'   => $hand?->id,
        ]);

        $this->pick($card);

        return $this;
    }

    public function dealCommunityCards(HandStreet $handStreet, int $cardCount): self
    {
        $dealtCards = 0;

        while ($dealtCards < $cardCount) {
            $card = $this->pick()->getCard();

            CommunityCard::create([
                'card_id'        => $card->value,
                'hand_street_id' => $handStreet->id,
            ]);

            ++$dealtCards;
        }

        return $this;
    }

    public function dealThisCommunityCard(Card $card, HandStreet $handStreet): self
    {
        $this->pick($card);

        CommunityCard::create([
            'card_id'        => $card->value,
            'hand_street_id' => $handStreet->id,
        ]);

        return $this;
    }
}
