<?php

use App\Models\CommunityCard;
use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\Pot;

test('a hand can have street cards', function () {
    $hand = Hand::factory()
        ->has(
            HandStreet::factory()->has(
                CommunityCard::factory(3)
            )
        )
        ->create();

    $hand->loadCount('communityCards');

    expect($hand->community_cards_count)->toBe(3);
});

test('a hand can have ordered pots', function () {
    $hand = Hand::factory()
        ->has(Pot::factory()->side(1)->state(['amount' => 250]))
        ->has(Pot::factory()->state(['amount' => 750]))
        ->create();

    expect($hand->pots)->toHaveCount(2)
        ->and($hand->pots->pluck('sequence')->all())->toBe([0, 1])
        ->and($hand->pots->pluck('amount')->all())->toBe([750, 250]);
});
