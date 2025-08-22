<?php

namespace App\Models;

use App\Enums\Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deck extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'cards' => 'array',
        ];
    }

    protected $fillable = [
        'cards',
        'hand_id',
    ];

    public static function new(): self
    {
        return self::create(['cards' => Card::toIds()]);
    }

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }
}
