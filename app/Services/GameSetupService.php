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
        $game = $input->gameId ? Game::find($input->gameId) : null;

        $table = $this->tableBuilder->build(
            $input->tableName,
            $input->seats,
            $game
        );

        // Return current game
        if ($game) {
            return $game;
        }

        return $this->gameBuilder->build(
            $table,
            $input->gameStyle,
            $input->gameMode
        );
    }
}