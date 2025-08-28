<?php

namespace App\Builders;

use App\Models\Game;
use App\Models\Table;
use App\Models\TableSeat;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TableBuilder
{
    public function build(string $tableName, int $seats, ?Game $game = null): Table
    {
        $table = $game->table ?? Table::create(['name' => $tableName]);

        // Delete then replace
        $table->tableSeats->each(fn ($seat) => $seat->delete());

        $table
            ->tableSeats()
            ->saveMany(
                TableSeat::factory($seats)
                    ->sequence(fn (Sequence $sequence) => ['number' => $sequence->index + 1])
                    ->create(['table_id' => $table->id, 'player_id' => null])
            );

        $table->refresh();

        return $table;
    }
}