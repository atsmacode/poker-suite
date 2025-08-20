<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ai',
    ];

    public function wholeCards(): HasMany
    {
        return $this->hasMany(WholeCard::class);
    }

    public function playerActions(): HasMany
    {
        return $this->hasMany(PlayerAction::class);
    }

    public function stacks(): HasMany
    {
        return $this->hasMany(Stack::class);
    }
}
