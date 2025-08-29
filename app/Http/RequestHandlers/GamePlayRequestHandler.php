<?php

namespace App\Http\RequestHandlers;

use App\Http\Requests\GamePlayRequest;
use App\Http\Resources\GameStateResource;
use App\Services\GamePlayService;
use App\Services\GameSetupService;
use App\Services\ScenarioSetupService;

class GamePlayRequestHandler
{
    public function __construct(
        private GameSetupService $gameSetup,
        private ScenarioSetupService $scenarioSetup,
        private GamePlayService $gamePlay
    ) {
    }

    public function scenario(GamePlayRequest $request): GameStateResource
    {
        $scenario = $this->scenarioSetup->setup($request->toInput());
        $gameState = $this->gamePlay->runScenario($scenario);

        return GameStateResource::make($gameState);
    }

    public function game(GamePlayRequest $request): void
    {
        // Add call to run game
    }
}