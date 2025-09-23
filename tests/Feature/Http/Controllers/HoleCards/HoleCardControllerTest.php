<?php

use App\Enums\Card;
use App\Models\Hand;
use App\Models\Player;
use Symfony\Component\HttpFoundation\Response;

test('it returns a successful response on store', function() {
    $hand = Hand::factory()->create();
    $player = Player::factory()->create();

    $response = $this->postJson('/holecards', [
        'player_id' => $player->id,
        'hand_id' => $hand->id,
        'card_id' => Card::_10C->value,
        'face_up' => false,
    ]);

    $response->assertStatus(Response::HTTP_OK);
});

test('it returns not found for non-existent hand', function() {
    $player = Player::factory()->create();

    $response = $this->postJson('/holecards', [
        'player_id' => $player->id,
        'hand_id' => 999,
        'card_id' => Card::_10C->value,
        'face_up' => false,
    ]);

    $response->assertStatus(Response::HTTP_NOT_FOUND);
});

test('it returns not found for non-existent card', function() {
    $hand = Hand::factory()->create();
    $player = Player::factory()->create();

    $response = $this->postJson('/holecards', [
        'player_id' => $player->id,
        'hand_id' => $hand->id,
        'card_id' => 999,
        'face_up' => false,
    ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});