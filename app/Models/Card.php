<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    public function rank(): HasOne
    {
        return $this->hasOne(Rank::class);
    }

    public function suit(): HasOne
    {
        return $this->hasOne(Suit::class);
    }

    public function getRankingAttribute(): int
    {
        return $this->rank->ranking;
    }


}
