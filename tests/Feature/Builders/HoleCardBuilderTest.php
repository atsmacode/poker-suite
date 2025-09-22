<?php

use App\Builders\HoleCardBuilder;
use App\Enums\Card;
use App\GamePlay\Dealer;
use App\Models\Hand;
use App\Models\Player;

test('it can build a specific hole card', function() {
    $hand = Hand::factory()->create();
    $player = Player::factory()->create();
    $cardId = Card::_2C->value;
    
    $builder = new HoleCardBuilder(new Dealer());
    $builder->buildHoleCard($player->id, $cardId, false, $hand->id);

    $holeCards = $player
        ->holeCards()
        ->where('hand_id', $hand->id)
        ->get();

    $this->assertContains($cardId, $holeCards->pluck('card_id'));
});