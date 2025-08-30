<?php

namespace App\Handlers;

use App\Http\Resources\GameStateResource;
use App\Models\Game;
use App\Services\GamePlayService;
use App\Services\GameSetupService;

class ShowGameHandler
{
    public function __construct(
        private GameSetupService $gameSetup,
        private GamePlayService $gamePlay
    ) {
    }

    public function handle(Game $game): GameStateResource
    {
        $gameState = $this->gamePlay->runGame($game);

        return GameStateResource::make($gameState);
    }
}