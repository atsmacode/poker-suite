<?php

namespace App\Builders;

use App\Models\Table;
use App\Models\TableSeat;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TableBuilder
{
    public function build(string $tableName, int $seats): Table
    {
        $table = Table::create(['name' => $tableName]);

        $this->buildSeats($table, $seats);

        $table->refresh();

        return $table;
    }

    public function updateSeats(Table $table, int $seats): Table
    {
        // Delete then replace
        TableSeat::where('table_id', $table->id)->delete();

        $this->buildSeats($table, $seats);

        $table->refresh();

        return $table;
    }

    public function buildSeats(Table $table, int $seats): void
    {
        TableSeat::factory($seats)
            ->empty()
            ->sequence(fn (Sequence $sequence) => ['number' => $sequence->index + 1])
            ->for($table)
            ->create();
    }
}