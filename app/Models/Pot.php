<?php

namespace App\Models;

use App\Enums\PotType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pot extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'type',
        'sequence',
        'hand_id',
    ];

    protected $casts = [
        'type' => PotType::class,
    ];

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }

    public function handPlayers(): BelongsToMany
    {
        return $this->belongsToMany(HandPlayer::class, 'pot_players')->using(PotPlayer::class);
    }
}
