<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function pots(): HasMany
    {
        return $this->hasMany(Pot::class)->orderBy('sequence');
    }

    public function communityCards(): HasManyThrough
    {
        return $this->hasManyThrough(CommunityCard::class, HandStreet::class);
    }

    public function complete(): void
    {
        $this->completed_on = now();
        $this->save();
    }
}
