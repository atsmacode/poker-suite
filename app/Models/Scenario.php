<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scenario extends Model
{
    use HasFactory;

    protected $fillable  = [
        'game_id',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'Test Scenario',
        'expires_at' => null,
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public static function draft(): self
    {
        $scenario = new self();
        $scenario->draft = 1;
        $scenario->expires_at = Carbon::now()->addDay();

        return $scenario;
    }

    public function saveDraft(): void
    {
        $this->draft = 0;
        $this->expires_at = null;
        $this->save();
    }
}
