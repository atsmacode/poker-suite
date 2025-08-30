<?php

namespace App\Handlers;

use App\Http\Resources\GameStateResource;
use App\Models\Game;
use App\Services\GamePlayService;

class ShowGameHandler
{
    public function __construct(
        private GamePlayService $gamePlay
    ) {
    }

    public function handle(Game $game): GameStateResource
    {
        $gameState = $this->gamePlay->runGame($game);

        return GameStateResource::make($gameState);
    }
}