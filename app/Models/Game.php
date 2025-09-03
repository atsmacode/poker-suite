<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'game_style_id',
        'game_mode_id'
    ];

    protected $with = [
        'gameTable.players',
        'gameTable.tableSeats',
    ];

    public function hands(): HasMany
    {
        return $this->hasMany(Hand::class);
    }

    public function gameTable(): BelongsTo
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function scenario(): HasOne
    {
        return $this->hasOne(Scenario::class);
    }

    public function getPlayers(): Collection
    {
        return $this->gameTable->players;
    }

    public function getSeats(): Collection
    {
        return $this->gameTable->tableSeats;
    }

    #[Scope]
    protected function withoutDrafts(Builder $query): void
    {
        $query->whereDoesntHave('scenario', function (Builder $query) {
            $query->where('draft', '=', 1);
        });
    }

    #[Scope]
    protected function withoutScenarios(Builder $query): void
    {
        $query->whereDoesntHave('scenario');
    }
}
