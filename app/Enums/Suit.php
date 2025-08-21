<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Suit: int
{
    use CanRandomiseCases;

    case CLUBS    = 1;
    case DIAMONDS = 2;
    case HEARTS   = 3;
    case SPADES   = 4;

    public function toArray(): array
    {
        return [
            'suit_id'     => $this->value,
            'suit'        => $this->name(),
            'suit_abbrev' => $this->abbreviation(),
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::CLUBS    => 'Clubs',
            self::DIAMONDS => 'Diamonds',
            self::HEARTS   => 'Hearts',
            self::SPADES   => 'Spades',
        };
    }

    public function abbreviation(): string
    {
        return match ($this) {
            self::CLUBS    => 'C',
            self::DIAMONDS => 'D',
            self::HEARTS   => 'H',
            self::SPADES   => 'S',
        };
    }
}
