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
        $scenario = $input->scenarioId ? Scenario::find($input->scenarioId) : Scenario::draft();

        // Updates table seats
        $game = $this->gameSetup->setup($input);

        // Return the current/updated scenario
        if ($input->scenarioId) {
            return $scenario;
        }

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