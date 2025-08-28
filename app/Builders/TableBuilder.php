<?php

namespace App\Builders;

use App\Models\Game;
use App\Models\Table;
use App\Models\TableSeat;

class TableBuilder
{
    public function build(string $tableName, int $seats, ?Game $game = null): Table
    {
        $table = $game->table ?? Table::create(['name' => $tableName]);

        // Delete then replace
        $table->tableSeats->each(fn ($seat) => $seat->delete());

        $table
            ->tableSeats()
            ->saveMany(TableSeat::factory($seats)->create(['table_id' => $table->id]));

        $table->refresh();

        return $table;
    }
}