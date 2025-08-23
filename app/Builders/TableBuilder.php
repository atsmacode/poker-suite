<?php

namespace App\Builders;

use App\Models\Table;
use App\Models\TableSeat;

class TableBuilder
{
    public function build(string $tableName, int $seats): Table
    {
        $table = Table::create(['name' => $tableName]);

        $table
            ->tableSeats()
            ->saveMany(TableSeat::factory($seats)->create());

        return $table;
    }
}