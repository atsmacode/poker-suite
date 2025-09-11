<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HandStreet extends Model
{
    use HasFactory;

    protected $fillable = [
        'street_id',
        'hand_id'
    ];

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }

    public function communityCards(): HasMany
    {
        return $this->hasMany(CommunityCard::class);
    }
}
