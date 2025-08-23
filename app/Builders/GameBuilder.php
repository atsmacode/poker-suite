<?php

namespace App\Builders;

use App\Enums\GameMode;
use App\Enums\GameStyle;
use App\Models\Game;

class GameBuilder
{
    public function build(int $tableId, string $gameStyle, string $mode): Game
    {
        return Game::create([
            'table_id' => $tableId,
            'game_style_id' => GameStyle::fromName($gameStyle),
            'game_mode_id' => GameMode::fromName($mode)
        ]);
    }
}