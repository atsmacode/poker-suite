<?php

use App\Input\GameSetupInput;
use App\Models\Game;
use App\Services\ScenarioSetupService;

test('it can associate a game with a scenario', function() {
    $scenarioService = app(ScenarioSetupService::class);
    
    $scenario = $scenarioService->setup(
        new GameSetupInput(
            gameId: null
        )
    );

    $this->assertInstanceOf(Game::class, $scenario->game);
});