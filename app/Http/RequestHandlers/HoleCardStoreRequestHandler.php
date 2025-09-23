<?php

namespace App\Http\RequestHandlers;

use App\Builders\HoleCardBuilder;
use App\GamePlay\GameState;
use App\Http\Requests\HoleCardStoreRequest;
use App\Http\Resources\GameStateResource;
use App\Models\Hand;

class HoleCardStoreRequestHandler
{
    public function __construct(private HoleCardBuilder $builder)
    {
    }

    public function handle(HoleCardStoreRequest $request): GameStateResource
    {
        $hand = Hand::find($request->input('hand_id'));

        $this->builder->buildHoleCard(
            $request->input('player_id'),
            $request->input('card_id'),
            $request->input('face_up'),
            $hand->id
        );

        $gameState = GameState::fromGame($hand->game);
    
        return GameStateResource::make($gameState);
    }
}