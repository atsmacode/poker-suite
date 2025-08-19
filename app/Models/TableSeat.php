<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TableSeat extends Pivot
{
    use HasFactory;

    protected $table = 'table_seats';

    protected $fillable = [
        'table_id',
        'player_id',
        'can_continue',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
