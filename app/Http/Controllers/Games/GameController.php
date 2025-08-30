<?php

namespace App\Http\Controllers\Games;

use App\Handlers\ShowGameHandler;
use App\Http\Controllers\Controller;
use App\Http\RequestHandlers\GameSetupRequestHandler;
use App\Http\Requests\GameSetupRequest;
use App\Models\Game;
use Inertia\Inertia;

class GameController extends Controller
{
    public function __construct(
        private GameSetupRequestHandler $requestHandler,
        private ShowGameHandler $showGame
    ) {
    }

    public function index()
    {
        return Inertia::render('Games/Index', ['games' => Game::all()]);
    }

    public function create()
    {
        return Inertia::render('Games/Create', ['token' => csrf_token()]);
    }

    public function store(GameSetupRequest $request)
    {
        $gameState = $this->requestHandler->game($request);

        return Inertia::render('Games/Show', ['gameState' => $gameState]);
    }

    public function show(Game $game)
    {
        $gameState = $this->showGame->handle($game);

        return Inertia::render('Games/Show', [
            'game' => $game,
            'gameState' => $gameState
        ]);
    }

    public function destroy(Game $game)
    {
        //
    }
}
