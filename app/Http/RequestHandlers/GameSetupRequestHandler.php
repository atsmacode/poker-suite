<?php

namespace App\Http\RequestHandlers;

use App\Http\Requests\GameSetupRequest;
use App\Http\Requests\ScenarioSetupRequest;
use App\Http\Resources\GameStateResource;
use App\Services\GamePlayService;
use App\Services\GameSetupService;
use App\Services\ScenarioSetupService;

class GameSetupRequestHandler
{
    public function __construct(
        private GameSetupService $gameSetup,
        private ScenarioSetupService $scenarioSetup,
        private GamePlayService $gamePlay
    ) {
    }

    public function scenario(ScenarioSetupRequest $request): GameStateResource
    {
        $scenario = $this->scenarioSetup->setup($request->toInput());
        $gameState = $this->gamePlay->runScenario($scenario);

        return GameStateResource::make($gameState);
    }

    public function game(GameSetupRequest $request): GameStateResource
    {
        $game = $this->gameSetup->setup($request->toInput());
        $gameState = $this->gamePlay->runGame($game);

        return GameStateResource::make($gameState);
    }
}