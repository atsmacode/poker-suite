<?php

namespace App\Builders;

use App\Enums\Card;
use App\GamePlay\Dealer;
use App\Models\Hand;
use App\Models\Player;

class HoleCardBuilder
{
    public function __construct(private Dealer $dealer)
    {
    }

    public function dealHoleCard(int $playerId, int $cardId, bool $faceUp, int $handId): void
    {
        $card = Card::from($cardId);
        $player = Player::findOrFail($playerId);
        $hand = Hand::findOrFail($handId);

        $this->dealer
            ->setDeck($hand->id)
            ->dealThisHoleCard($player, $card, $faceUp, $hand);
    }
}