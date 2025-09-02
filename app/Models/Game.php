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

    public function hands(): HasMany
    {
        return $this->hasMany(Hand::class);
    }

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    public function scenario(): HasOne
    {
        return $this->hasOne(Scenario::class);
    }

    #[Scope]
    protected function withoutDrafts(Builder $query): void
    {
        $query
            ->leftJoin('scenarios', 'games.id', '=', 'scenarios.game_id')
            ->whereNull('scenarios.id')
            ->orWhere('scenarios.draft', 0);
    }

    #[Scope]
    protected function withoutScenarios(Builder $query): void
    {
        $query
            ->leftJoin('scenarios', 'games.id', '=', 'scenarios.game_id')
            ->whereNull('scenarios.id');
    }
}
