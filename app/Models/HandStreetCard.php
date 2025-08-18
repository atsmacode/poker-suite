<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HandStreetCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'hand_street_id'
    ];

    public function card(): HasOne
    {
        return $this->hasOne(Card::class);
    }
}
