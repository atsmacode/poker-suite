<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seats'
    ];

    public function tableSeats(): HasMany
    {
        return $this->hasMany(TableSeat::class);
    }

    public function players(): HasManyThrough
    {
        return $this->hasManyThrough(Player::class, TableSeat::class);
    }

    public function hands(): HasMany
    {
        return $this->hasMany(Hand::class);
    }
}
