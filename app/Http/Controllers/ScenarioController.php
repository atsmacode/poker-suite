<?php

namespace App\Http\Controllers;

use App\Http\RequestHandlers\GameSetupRequestHandler;
use App\Http\Requests\GameSetupRequest;
use App\Http\Resources\GameStateResource;
use App\Models\Scenario;
use Inertia\Inertia;

class ScenarioController extends Controller
{
    public function __construct(
        private GameSetupRequestHandler $requestHandler
    ) {
    }

    public function index()
    {
        return Inertia::render('Scenarios/Index', [
            'scenarios' => Scenario::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Scenarios/Create', [
            'token' => csrf_token()
        ]);
    }

    public function store(GameSetupRequest $request)
    {
        //
    }

    public function show(Scenario $scenario)
    {
        return Inertia::render('Scenarios/Show', ['scenario' => $scenario]);
    }

    public function edit(Scenario $scenario)
    {
        //
    }

    public function update(GameSetupRequest $request)
    {
        //
    }

    public function destroy(Scenario $scenario)
    {
        //
    }

    public function setup(GameSetupRequest $request): GameStateResource
    {
        return $this->requestHandler->scenario($request);
    }
}
