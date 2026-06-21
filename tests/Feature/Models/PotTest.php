<?php

use App\Enums\PotType;
use App\Models\Hand;
use App\Models\HandPlayer;
use App\Models\Pot;

test('a pot casts its type', function () {
    $pot = Pot::factory()->side()->create();

    expect($pot->type)->toBe(PotType::Side)
        ->and($pot->sequence)->toBe(1);
});

test('a pot can have eligible hand players', function () {
    $hand = Hand::factory()->create();
    $handPlayers = HandPlayer::factory(2)->for($hand)->create();
    $pot = Pot::factory()->for($hand)->create();

    $pot->handPlayers()->attach($handPlayers);

    expect($pot->handPlayers)->toHaveCount(2)
        ->and($handPlayers->first()->pots)->toHaveCount(1)
        ->and($handPlayers->first()->pots->first()->is($pot))->toBeTrue();
});
