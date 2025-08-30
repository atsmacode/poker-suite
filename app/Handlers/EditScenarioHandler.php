<?php

namespace App\Handlers;

use App\Http\Resources\GameStateResource;
use App\Models\Scenario;
use App\Services\GamePlayService;

class EditScenarioHandler
{
    public function __construct(
        private GamePlayService $gamePlay
    ) {
    }

    public function handle(Scenario $scenario): GameStateResource
    {
        $gameState = $this->gamePlay->runScenario($scenario);

        return GameStateResource::make($gameState);
    }
}