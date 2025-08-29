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

    /**
     * For building a real game with fixed table seat count.
     */
    public function setup(GameSetupInput $input): Game
    {
        $table = $this->tableBuilder->build(
            $input->tableName,
            $input->seats
        );

        // Add call to a PlayerBuilder class load/create players
        // Call new method on TableBuilder to add players to seats

        return $this->gameBuilder->build(
            $table,
            $input->gameStyle,
            $input->gameMode
        );
    }

    /**
     * For new games & changing seat counts in scenario UI.
     */
    public function setupOrUpdate(GameSetupInput $input): Game
    {
        $game = $input->gameId ? Game::find($input->gameId) : null;

        if ($game) {
            $this->tableBuilder->updateSeats(
                $game->table,
                $input->seats
            );

            return $game;
        }

        $table = $this->tableBuilder->build(
            $input->tableName,
            $input->seats
        );

        return $this->gameBuilder->build(
            $table,
            $input->gameStyle,
            $input->gameMode
        );
    }
}