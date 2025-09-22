<?php

namespace App\Http\RequestHandlers;

use App\Builders\TableBuilder;
use App\Http\Requests\ScenarioPlayerStoreRequest;
use App\Http\Resources\GameStateResource;
use App\Models\Player;
use App\Models\Scenario;
use App\Models\TableSeat;
use App\Services\GamePlayService;

class ScenarioPlayerStoreRequestHandler
{
    public function __construct(
        private GamePlayService $gamePlay,
        private TableBuilder $tableBuilder
    ) {  
    }

    public function handle(ScenarioPlayerStoreRequest $request, int $scenarioId): GameStateResource
    {
        $player = $request->has('player_id') ? Player::findOrFail($request->input('player_id')) : null;
        $tableSeat = TableSeat::findOrFail($request->input('table_seat_id'));

        $this->tableBuilder->addPlayer($tableSeat, $player);

        $scenario = Scenario::findOrFail($scenarioId);

        $gameState = $this->gamePlay->runScenario($scenario);

        return GameStateResource::make($gameState);
    }
}