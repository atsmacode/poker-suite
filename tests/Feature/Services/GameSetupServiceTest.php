<?php

use App\Input\GameSetupInput;
use App\Models\Game;
use App\Models\Table;
use App\Models\TableSeat;
use App\Services\GameSetupService;

test('it can build a table for a game', function() {
    $service = app(GameSetupService::class);
    
    $game = $service->setup(
        new GameSetupInput(
            gameId: null,
            tableName: 'Unit Test Table'
        )
    );

    $this->assertInstanceOf(Table::class, $game->table);
    
    expect($game->table->name)->toBe('Unit Test Table');
});

test('it can update table seats for an existing game', function() {
    $service = app(GameSetupService::class);

    $game = Game::factory()->create();

    TableSeat::factory(3)->for($game->table)->create();
    
    $game = $service->setupOrUpdate(
        new GameSetupInput(
            gameId: $game->id,
            seats: 6
        )
    );
    
    expect($game->table->tableSeats->count())->toBe(6);
});