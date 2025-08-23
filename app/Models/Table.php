<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tableSeats(): HasMany
    {
        return $this->hasMany(TableSeat::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'table_seats')
            ->using(TableSeat::class)
            ->as('tableSeat');
    }

    public function hands(): HasMany
    {
        return $this->hasMany(Hand::class);
    }
}
