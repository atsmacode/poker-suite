<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TableSeat extends Model
{
    use HasFactory;

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
