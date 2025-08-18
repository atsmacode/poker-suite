<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stack extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'player_id',
        'table_id'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
