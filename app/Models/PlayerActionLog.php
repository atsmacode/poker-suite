<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerActionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'player_action_id',
        'player_id',
        'table_seat_id',
        'action_id',
        'bet_amount',
        'hand_id',
        'active',
        'big_blind'
    ];

    public function playerAction(): BelongsTo
    {
        return $this->belongsTo(PlayerAction::class);
    }
}
