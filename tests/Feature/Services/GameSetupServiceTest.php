<?php

use App\Input\GameSetupInput;
use App\Input\ScenarioSetupInput;
use App\Models\Game;
use App\Models\Table;
use App\Models\TableSeat;
use App\Services\GameSetupService;

test('it can build a table for a game', function() {
    $service = app(GameSetupService::class);
    
    $game = $service->setup(
        new GameSetupInput(
            tableName: 'Unit Test Table'
        )
    );

    $this->assertInstanceOf(Table::class, $game->gameTable);
    
    expect($game->gameTable->name)->toBe('Unit Test Table');
});

test('it can update table seats for a scenario', function() {
    $service = app(GameSetupService::class);

    $game = Game::factory()->create();

    TableSeat::factory(3)->for($game->gameTable)->create();
    
    $game = $service->setupScenario(
        new ScenarioSetupInput(
            $game->id,
            seats: 6
        )
    );
    
    expect($game->gameTable->tableSeats->count())->toBe(6);
});

test('it can auto-generate players for a table', function() {
    $service = app(GameSetupService::class);

    $game = $service->setup(new GameSetupInput());

    $game->gameTable->tableSeats->each(fn (TableSeat $tableSeat) => $this->assertNotNull($tableSeat->player_id));
});