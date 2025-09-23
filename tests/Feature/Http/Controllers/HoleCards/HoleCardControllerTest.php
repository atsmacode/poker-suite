<?php

use App\Enums\Card;
use App\Models\Hand;
use App\Models\Player;
use Symfony\Component\HttpFoundation\Response;

test('it returns a successful response on store', function() {
    $hand = Hand::factory()->create();
    $player = Player::factory()->create();
    $card = Card::_10C;

    $response = $this->post('/holecards', [
        'player_id' => $player->id,
        'hand_id' => $hand->id,
        'card_id' => $card->value,
        'face_up' => false,
    ]);

    $response->assertStatus(Response::HTTP_OK);
});