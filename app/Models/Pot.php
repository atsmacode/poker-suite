<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Pot extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'hand_id'
    ];

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }
}
