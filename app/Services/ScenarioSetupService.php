<?php

namespace App\Services;

use App\Input\GameSetupInput;
use App\Models\Scenario;

class ScenarioSetupService
{
    public function __construct(private GameSetupService $gameSetup)
    {
    }

    public function setup(GameSetupInput $input): Scenario
    {
        // Create a new draft or load one currently in use
        $scenario = $input->scenarioId ? Scenario::find($input->scenarioId) : Scenario::draft();

        // Update or create table seats
        $game = $this->gameSetup->setupOrUpdate($input);

        // Return the current/updated scenario
        if ($input->scenarioId) {
            return $scenario;
        }

        // Otherwise page was probably reloaded, save new scenario
        $scenario
            ->game()
            ->associate($game);

        $scenario->save();

        $scenario
            ->game
            ->table
            ->loadMissing('tableSeats');

        return $scenario;
    }
}