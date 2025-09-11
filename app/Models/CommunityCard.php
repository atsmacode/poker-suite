<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'hand_street_id'
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
