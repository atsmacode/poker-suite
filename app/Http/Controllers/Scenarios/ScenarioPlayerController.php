<?php

namespace App\Http\Controllers\Scenarios;

use App\GamePlay\GameState;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScenarioPlayerDeleteRequest;
use App\Http\Requests\ScenarioPlayerStoreRequest;
use App\Http\Resources\GameStateResource;

/**
 * This effectively triggers TableSeat etc resource actions, but since we
 * want to return an updated GameState, we have our own Scenario controller.
 */
class ScenarioPlayerController extends Controller
{
    /**
     * Adds a player to a seat.
     */
    public function store(ScenarioPlayerStoreRequest $request): GameStateResource
    {
        // Handle request...

        return GameStateResource::make(new GameState);
    }

    /**
     * Removes a player from a seat.
     */
    public function destroy(ScenarioPlayerDeleteRequest $request): GameStateResource
    {
        // Handle request...

        return GameStateResource::make(new GameState);
    }
}
