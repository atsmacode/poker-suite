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
        TableSeat::where('table_id', $table->id)->delete();

        TableSeat::factory($seats)
            ->empty()
            ->sequence(fn (Sequence $sequence) => ['number' => $sequence->index + 1])
            ->for($table)
            ->create();

        $table->refresh();

        return $table;
    }
}