<?php

namespace App\Builders;

use App\Enums\GameMode;
use App\Enums\GameStyle;
use App\Models\Game;
use App\Models\Table;

class GameBuilder
{
    public function build(Table $table, string $gameStyle, string $mode): Game
    {
        $game = new Game([
            'game_style_id' => GameStyle::fromAbbrev($gameStyle),
            'game_mode_id' => GameMode::fromName($mode)
        ]);

        $game->gameTable()->associate($table);
        $game->save();

        return $game;
    }
}