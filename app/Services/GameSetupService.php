<?php

namespace App\Services;

use App\Builders\GameBuilder;
use App\Builders\TableBuilder;
use App\Models\Game;
use App\Input\GameSetupInput;

class GameSetupService
{
    public function __construct(
        private TableBuilder $tableBuilder,
        private GameBuilder $gameBuilder
    ) {}

    public function setup(GameSetupInput $input): Game
    {
        if ($input->gameId) {
            return Game::find($input->gameId);
        }

        $table = $this->tableBuilder->build(
            $input->tableName,
            $input->seats
        );

        return $this->gameBuilder->build(
            $table->id,
            $input->gameStyle,
            $input->gameMode,
            $input->gameId
        );
    }
}