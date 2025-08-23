<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScenarioRequest;
use App\Models\Scenario;
use Inertia\Inertia;

class ScenarioController extends Controller
{
    public function index()
    {
        return Inertia::render('Scenarios/Index');
    }

    public function create()
    {
        //
    }

    public function store(ScenarioRequest $request)
    {
        //
    }

    public function show(Scenario $scenario)
    {
        //
    }

    public function edit(Scenario $scenario)
    {
        //
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
