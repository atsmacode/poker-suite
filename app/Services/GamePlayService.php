<?php

namespace App\Services;

use App\GamePlay\GameState;
use App\Models\Game;
use App\Models\Scenario;

class GamePlayService
{
    public function runGame(Game $game)
    {
        $gameState = GameState::fromGame($game);

        return $this->run($gameState);
    }

    public function runScenario(Scenario $scenario)
    {
        $gameState = GameState::fromScenario($scenario);

        return $this->run($gameState);
    }

    public function run(GameState $gameState): GameState
    {
        // Add pipeline steps for dealer/blinds etc

        return $gameState;
    }
}