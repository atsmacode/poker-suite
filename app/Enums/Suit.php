<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Suit: string
{
    use CanRandomiseCases;

    case CLUBS    = 'clubs';
    case DIAMONDS = 'diamonds';
    case HEARTS   = 'hearts';
    case SPADES   = 'spades';

    public const CLUBS_SUIT_ID    = 1;
    public const DIAMONDS_SUIT_ID = 2;
    public const HEARTS_SUIT_ID   = 3;
    public const SPADES_SUIT_ID   = 4;

    public function toArray(): array
    {
        return match ($this) {
            self::CLUBS => [
                'suit_id' => self::CLUBS_SUIT_ID,
                'suit' => 'Clubs',
                'suit_abbrev' => 'C',
            ],
            self::DIAMONDS => [
                'suit_id' => self::DIAMONDS_SUIT_ID,
                'suit' => 'Diamonds',
                'suit_abbrev' => 'D',
            ],
            self::HEARTS => [
                'suit_id' => self::HEARTS_SUIT_ID,
                'suit' => 'Hearts',
                'suit_abbrev' => 'H',
            ],
            self::SPADES => [
                'suit_id' => self::SPADES_SUIT_ID,
                'suit' => 'Spades',
                'suit_abbrev' => 'S',
            ],
        };
    }
}
