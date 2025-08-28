<?php

namespace App\Services;

use App\Input\GameSetupInput;
use App\Models\Scenario;

class ScenarioSetupService
{
    public function __construct(private GameSetupService $gameSetup)
    {
    }

    /**
     * Generate a scenario without persisting it.
     */
    public function generate(GameSetupInput $input): Scenario
    {
        $game = $this->gameSetup->setup($input);
    
        $scenario = new Scenario();

        $scenario->id = null;
        $scenario->game()->associate($game);

        return $scenario;
    }
}