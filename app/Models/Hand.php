<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hand extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'game_type_id'
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function playerActions(): HasManyThrough
    {
        return $this->hasManyThrough(PlayerAction::class, HandStreet::class);
    }

    public function streets(): HasMany
    {
        return $this->hasMany(HandStreet::class);
    }

    public function wholeCards(): HasMany
    {
        return $this->hasMany(WholeCard::class);
    }

    public function pot(): HasOne
    {
        return $this->hasOne(Pot::class);
    }

    public function complete()
    {
        $this->completed_on = now();
        $this->save();
    }
}
