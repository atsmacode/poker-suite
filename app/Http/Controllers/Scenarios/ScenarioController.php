<?php

namespace App\Http\Controllers\Scenarios;

use App\Handlers\EditScenarioHandler;
use App\Http\Controllers\Controller;
use App\Http\RequestHandlers\GameSetupRequestHandler;
use App\Http\Requests\GameSetupRequest;
use App\Http\Resources\GameStateResource;
use App\Models\Scenario;
use Inertia\Inertia;

class ScenarioController extends Controller
{
    public function __construct(
        private GameSetupRequestHandler $requestHandler,
        private EditScenarioHandler $editScenario
    ) {
    }

    public function index()
    {
        return Inertia::render('Scenarios/Index', ['scenarios' => Scenario::all()]);
    }

    public function create()
    {
        return Inertia::render('Scenarios/Create', ['token' => csrf_token()]);
    }

    /**
     * Save a draft scenario (draft = 0, expires_at = null).
     */
    public function store(Scenario $scenario)
    {
        $scenario->saveDraft();

        return response()->json(['Scenario draft saved']);
    }

    public function edit(Scenario $scenario)
    {
        $gameState = $this->editScenario->handle($scenario);

        return Inertia::render('Scenarios/Edit', [
            'scenario' => $scenario,
            'gameState' => $gameState
        ]);
    }

    /**
     * Update a saved scenario. Separate from setup() because we
     * may need to reset Hands/HandPlayers if seat counts change.
     */
    public function update(GameSetupRequest $request)
    {
        // 
    }

    /**
     * Delete a saved scenario.
     */
    public function destroy(Scenario $scenario)
    {
        //
    }

    /**
     * Setup or change a draft scenario.
     */
    public function setup(GameSetupRequest $request): GameStateResource
    {
        return $this->requestHandler->scenario($request);
    }
}
