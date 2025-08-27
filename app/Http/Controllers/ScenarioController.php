<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScenarioRequest;
use App\Models\Scenario;
use App\Services\ScenarioSetupService;
use Inertia\Inertia;

class ScenarioController extends Controller
{
    public function __construct(private ScenarioSetupService $setup)
    {
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

    public function store(ScenarioRequest $request)
    {
        //
    }

    public function show(Scenario $scenario)
    {
        return Inertia::render('Scenarios/Show', ['scenario' => $scenario]);
    }

    public function edit(Scenario $scenario)
    {
        return Inertia::render('Scenarios/Show', ['scenario' => $scenario]);
    }

    public function update(ScenarioRequest $request)
    {
        //
    }

    public function destroy(Scenario $scenario)
    {
        //
    }

    public function generate(ScenarioRequest $request): Scenario
    {
        return $this->setup->generate($request->toInput());
    }
}
