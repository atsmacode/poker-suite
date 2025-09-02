<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hand extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function playerActions(): HasMany
    {
        return $this->hasMany(PlayerAction::class);
    }

    public function handStreets(): HasMany
    {
        return $this->hasMany(HandStreet::class);
    }

    public function holeCards(): HasMany
    {
        return $this->hasMany(HoleCard::class);
    }

    public function pot(): HasOne
    {
        return $this->hasOne(Pot::class);
    }

    public function handStreetCards(): HasManyThrough
    {
        return $this->hasManyThrough(HandStreetCard::class, HandStreet::class);
    }

    public function complete(): void
    {
        $this->completed_on = now();
        $this->save();
    }
}
