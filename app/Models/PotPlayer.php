<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PotPlayer extends Pivot
{
    protected $table = 'pot_players';

    public function pot(): BelongsTo
    {
        return $this->belongsTo(Pot::class);
    }

    public function handPlayer(): BelongsTo
    {
        return $this->belongsTo(HandPlayer::class);
    }
}
