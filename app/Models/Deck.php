<?php

namespace App\Models;

use App\Enums\Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = [
        'hand_id',
    ];

    public static function new(?Hand $hand = null): self
    {
        $deck = self::create(['hand_id' => $hand?->id]);

        $deck->deckCards()->createMany(
            collect(Card::toIds())->map(fn (int $cardId) => [
                'card_id' => $cardId,
            ])->all()
        );

        return $deck;
    }

    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }

    public function deckCards(): HasMany
    {
        return $this->hasMany(DeckCard::class)->orderBy('position');
    }

    public function remainingCards(): HasMany
    {
        return $this->hasMany(DeckCard::class)->where('dealt', false)->orderBy('position');
    }
}
