<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Rank: string
{
    use CanRandomiseCases;

    case ACE   = 'ace';
    case DEUCE = 'deuce';
    case THREE = 'three';
    case FOUR  = 'four';
    case FIVE  = 'five';
    case SIX   = 'six';
    case SEVEN = 'seven';
    case EIGHT = 'eight';
    case NINE  = 'nine';
    case TEN   = 'ten';
    case JACK  = 'jack';
    case QUEEN = 'queen';
    case KING  = 'king';

    public const ACE_RANK_ID   = 1;
    public const DEUCE_RANK_ID = 2;
    public const THREE_RANK_ID = 3;
    public const FOUR_RANK_ID  = 4;
    public const FIVE_RANK_ID  = 5;
    public const SIX_RANK_ID   = 6;
    public const SEVEN_RANK_ID = 7;
    public const EIGHT_RANK_ID = 8;
    public const NINE_RANK_ID  = 9;
    public const TEN_RANK_ID   = 10;
    public const JACK_RANK_ID  = 11;
    public const QUEEN_RANK_ID = 12;
    public const KING_RANK_ID  = 13;

    public const ACE_HIGH_RANK_ID = 14;

    public function toArray(): array
    {
        return match ($this->value) {
            'ace' => [
                'rank_id' => self::ACE_RANK_ID,
                'rank' => 'Ace',
                'ranking' => 1,
                'rank_abbrev' => 'A',
            ],
            'deuce' => [
                'rank_id' => self::DEUCE_RANK_ID,
                'rank' => 'Deuce',
                'ranking' => 2,
                'rank_abbrev' => '2',
            ],
            'three' => [
                'rank_id' => self::THREE_RANK_ID,
                'rank' => 'Three',
                'ranking' => 3,
                'rank_abbrev' => '3',
            ],
            'four' => [
                'rank_id' => self::FOUR_RANK_ID,
                'rank' => 'Four',
                'ranking' => 4,
                'rank_abbrev' => '4',
            ],
            'five' => [
                'rank_id' => self::FIVE_RANK_ID,
                'rank' => 'Five',
                'ranking' => 5,
                'rank_abbrev' => '5',
            ],
            'six' => [
                'rank_id' => self::SIX_RANK_ID,
                'rank' => 'Six',
                'ranking' => 6,
                'rank_abbrev' => '6',
            ],
            'seven' => [
                'rank_id' => self::SEVEN_RANK_ID,
                'rank' => 'Seven',
                'ranking' => 7,
                'rank_abbrev' => '7',
            ],
            'eight' => [
                'rank_id' => self::EIGHT_RANK_ID,
                'rank' => 'Eight',
                'ranking' => 8,
                'rank_abbrev' => '8',
            ],
            'nine' => [
                'rank_id' => self::NINE_RANK_ID,
                'rank' => 'Nine',
                'ranking' => 9,
                'rank_abbrev' => '9',
            ],
            'ten' => [
                'rank_id' => self::TEN_RANK_ID,
                'rank' => 'Ten',
                'ranking' => 10,
                'rank_abbrev' => '10',
            ],
            'jack' => [
                'rank_id' => self::JACK_RANK_ID,
                'rank' => 'Jack',
                'ranking' => 11,
                'rank_abbrev' => 'J',
            ],
            'queen' => [
                'rank_id' => self::QUEEN_RANK_ID,
                'rank' => 'Queen',
                'ranking' => 12,
                'rank_abbrev' => 'Q',
            ],
            'king' => [
                'rank_id' => self::KING_RANK_ID,
                'rank' => 'King',
                'ranking' => 13,
                'rank_abbrev' => 'K',
            ],
        };
    }
}
