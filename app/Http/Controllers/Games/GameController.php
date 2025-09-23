<?php

namespace App\Http\Controllers\Games;

use App\Handlers\ShowGameHandler;
use App\Http\Controllers\Controller;
use App\Http\RequestHandlers\GameSetupRequestHandler;
use App\Http\Requests\GameSetupRequest;
use App\Models\Game;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class GameController extends Controller
{
    public function __construct(
        private GameSetupRequestHandler $requestHandler,
        private ShowGameHandler $showGame
    ) {
    }

    public function index(): InertiaResponse
    {
        return Inertia::render('games/Index', ['games' => Game::withoutScenarios()->get()]);
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('games/Create', ['token' => csrf_token()]);
    }

    public function store(GameSetupRequest $request): InertiaResponse
    {
        $gameState = $this->requestHandler->game($request);

        return Inertia::render('games/Show', [
            'game' => $gameState->getGame(),
            'gameState' => $gameState
        ]);
    }

    public function show(Game $game): InertiaResponse
    {
        $gameState = $this->showGame->handle($game);

        return Inertia::render('games/Show', [
            'game' => $game,
            'gameState' => $gameState
        ]);
    }

    public function destroy(Game $game)
    {
        //
    }
}
