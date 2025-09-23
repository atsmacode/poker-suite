<?php

namespace App\Http\RequestHandlers;

use App\GamePlay\GameState;
use App\Http\Requests\HoleCardStoreRequest;
use App\Http\Resources\GameStateResource;
use App\Models\Hand;

class HoleCardStoreRequestHandler
{
    public function handle(HoleCardStoreRequest $request): GameStateResource
    {
        $hand = Hand::find($request->input('hand_id'));
        $gameState = GameState::fromGame($hand->game);
    
        return GameStateResource::make($gameState);
    }
}