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

    public function buildHoleCard(int $playerId, int $cardId, bool $faceUp, int $handId): void
    {
        $card = Card::get($cardId);
        $player = Player::findOrFail($playerId);
        $hand = Hand::findOrFail($handId);

        $this->dealer
            ->forHand($hand)
            ->dealThisHoleCard($player, $card, $faceUp, $hand);
    }
}