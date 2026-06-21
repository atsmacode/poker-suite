<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HandPlayer extends Model
{
    use HasFactory;

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }

    public function pots(): BelongsToMany
    {
        return $this->belongsToMany(Pot::class, 'pot_players')->using(PotPlayer::class);
    }
}
