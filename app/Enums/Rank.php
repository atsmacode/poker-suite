<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Rank: int
{
    use CanRandomiseCases;

    case ACE   = 1;
    case DEUCE = 2;
    case THREE = 3;
    case FOUR  = 4;
    case FIVE  = 5;
    case SIX   = 6;
    case SEVEN = 7;
    case EIGHT = 8;
    case NINE  = 9;
    case TEN   = 10;
    case JACK  = 11;
    case QUEEN = 12;
    case KING  = 13;

    public const ACE_HIGH = 14;

    public function toArray(): array
    {
        return [
            'rank_id'     => $this->value,
            'rank'        => $this->name(),
            'ranking'     => $this->value,
            'rank_abbrev' => $this->abbreviation(),
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::ACE   => 'Ace',
            self::DEUCE => 'Deuce',
            self::THREE => 'Three',
            self::FOUR  => 'Four',
            self::FIVE  => 'Five',
            self::SIX   => 'Six',
            self::SEVEN => 'Seven',
            self::EIGHT => 'Eight',
            self::NINE  => 'Nine',
            self::TEN   => 'Ten',
            self::JACK  => 'Jack',
            self::QUEEN => 'Queen',
            self::KING  => 'King',
        };
    }

    public function abbreviation(): string
    {
        return match ($this) {
            self::ACE   => 'A',
            self::DEUCE => '2',
            self::THREE => '3',
            self::FOUR  => '4',
            self::FIVE  => '5',
            self::SIX   => '6',
            self::SEVEN => '7',
            self::EIGHT => '8',
            self::NINE  => '9',
            self::TEN   => '10',
            self::JACK  => 'J',
            self::QUEEN => 'Q',
            self::KING  => 'K',
        };
    }
}
