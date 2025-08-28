<?php

use App\Input\GameSetupInput;
use App\Models\Table;
use App\Services\GameSetupService;

test('it can build a table for a game', function() {
    $service = app(GameSetupService::class);
    
    $game = $service->setup(
        new GameSetupInput(
            gameId: null
        )
    );

    $this->assertInstanceOf(Table::class, $game->table);
    
    expect($game->table->name)->toBe('Test Table');
});