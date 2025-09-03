<?php

use App\Input\ScenarioSetupInput;
use App\Models\Game;
use App\Services\ScenarioSetupService;

test('it can associate a game with a scenario', function() {
    $scenarioService = app(ScenarioSetupService::class);
    $game = Game::factory()->create();
    
    $scenario = $scenarioService->setup(
        new ScenarioSetupInput(
            gameId: $game->id
        )
    );

    expect($scenario->game->id)->toBe($game->id);
});