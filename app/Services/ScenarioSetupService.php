<?php

namespace App\Services;

use App\Input\GameSetupInput;
use App\Models\Scenario;
use Carbon\Carbon;

class ScenarioSetupService
{
    public function __construct(private GameSetupService $gameSetup)
    {
    }

    public function generate(GameSetupInput $input): Scenario
    {
        $game = $this->gameSetup->setup($input);
        $scenario = $input->scenarioId ? Scenario::find($input->scenarioId) : Scenario::draft();

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