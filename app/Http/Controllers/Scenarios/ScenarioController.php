<?php

namespace App\Http\Controllers\Scenarios;

use App\Handlers\EditScenarioHandler;
use App\Http\Controllers\Controller;
use App\Http\RequestHandlers\GameSetupRequestHandler;
use App\Http\Requests\ScenarioSaveDraftRequest;
use App\Http\Requests\ScenarioSetupRequest;
use App\Http\Resources\GameStateResource;
use App\Http\Resources\ScenarioResource;
use App\Models\Scenario;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class ScenarioController extends Controller
{
    public function __construct(
        private GameSetupRequestHandler $requestHandler,
        private EditScenarioHandler $editScenario
    ) {
    }

    public function index()
    {
        return Inertia::render('scenarios/Index', [
            'scenarios' => ScenarioResource::collection(
                Scenario::all()->keyBy->id
            )
        ]);
    }

    public function create()
    {
        return Inertia::render('scenarios/Create', ['token' => csrf_token()]);
    }

    /**
     * Save/unsave a draft scenario (draft = 0, expires_at = null).
     */
    public function draft(ScenarioSaveDraftRequest $request, int $scenarioId)
    {
        $scenario = Scenario::find($scenarioId);

        if (! $scenario) {
            return response()->json(['message' => 'Scenario not found'], Response::HTTP_NOT_FOUND);
        }

        $request->input('draft')
            ? $scenario->setAsDraft()
            : $scenario->saveDraft();

        return response()->json(['message' => 'Scenario draft saved'], Response::HTTP_OK);
    }

    public function edit(Scenario $scenario)
    {
        $gameState = $this->editScenario->handle($scenario);

        return Inertia::render('scenarios/Edit', [
            'scenario' => $scenario,
            'gameState' => $gameState
        ]);
    }

    /**
     * Delete a saved scenario.
     */
    public function destroy(Scenario $scenario)
    {
        //
    }

    /**
     * Setup or change game/table/seats for a draft scenario.
     */
    public function setup(ScenarioSetupRequest $request): GameStateResource
    {
        return $this->requestHandler->scenario($request);
    }
}
