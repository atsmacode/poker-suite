<?php

namespace App\Http\RequestHandlers;

use App\Builders\HoleCardBuilder;
use App\GamePlay\GameState;
use App\Http\Requests\HoleCardStoreRequest;
use App\Http\Resources\GameStateResource;
use App\Models\Hand;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HoleCardStoreRequestHandler
{
    public function __construct(private HoleCardBuilder $builder)
    {
    }

    public function handle(HoleCardStoreRequest $request): JsonResponse
    {
        $hand = Hand::findOrFail($request->input('hand_id'));

        $this->builder->buildHoleCard(
            $request->input('player_id'),
            $request->input('card_id'),
            $request->input('face_up'),
            $hand->id
        );

        $gameState = GameState::fromGame($hand->game);
    
        return GameStateResource::make($gameState)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}