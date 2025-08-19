<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlayerAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'player_id',
        'table_seat_id',
        'action_id',
        'bet_amount',
        'hand_id',
        'active',
        'big_blind'
    ];

    public function hand(): HasOne
    {
        return $this->hasOne(Hand::class);
    }

    public function action(): HasOne
    {
        return $this->hasOne(Action::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function tableSeat(): HasOne
    {
        return $this->hasOne(TableSeat::class);
    }
}
