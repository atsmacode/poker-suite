<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'hand_player_id',
        'sequence',
    ];

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }

    public function handPlayer(): BelongsTo
    {
        return $this->belongsTo(HandPlayer::class);
    }

    public function action(): BelongsTo
    {
        return $this->belongsTo(Action::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function tableSeat(): BelongsTo
    {
        return $this->belongsTo(TableSeat::class);
    }
}
