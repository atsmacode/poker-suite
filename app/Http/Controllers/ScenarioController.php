<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScenarioRequest;
use App\Models\Scenario;
use Inertia\Inertia;

class ScenarioController extends Controller
{
    public function index()
    {
        return Inertia::render('Scenarios/Index', [
            'scenarios' => Scenario::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Scenarios/Create');
    }

    public function store(ScenarioRequest $request)
    {
        //
    }

    public function show(Scenario $scenario)
    {
        return Inertia::render('Scenarios/Edit', ['scenario' => $scenario]);
    }

    public function edit(Scenario $scenario)
    {
        return Inertia::render('Scenarios/Edit', ['scenario' => $scenario]);
    }

    public function update(ScenarioRequest $request)
    {
        //
    }

    public function destroy(Scenario $scenario)
    {
        //
    }
}
