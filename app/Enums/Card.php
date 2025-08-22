<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Card: int
{
    use CanRandomiseCases;

    // Clubs (1–13)
    case AC   = 1;
    case _2C  = 2;
    case _3C  = 3;
    case _4C  = 4;
    case _5C  = 5;
    case _6C  = 6;
    case _7C  = 7;
    case _8C  = 8;
    case _9C  = 9;
    case _10C = 10;
    case JC   = 11;
    case QC   = 12;
    case KC   = 13;

    // Diamonds (14–26)
    case AD   = 14;
    case _2D  = 15;
    case _3D  = 16;
    case _4D  = 17;
    case _5D  = 18;
    case _6D  = 19;
    case _7D  = 20;
    case _8D  = 21;
    case _9D  = 22;
    case _10D = 23;
    case JD   = 24;
    case QD   = 25;
    case KD   = 26;

    // Hearts (27–39)
    case AH   = 27;
    case _2H  = 28;
    case _3H  = 29;
    case _4H  = 30;
    case _5H  = 31;
    case _6H  = 32;
    case _7H  = 33;
    case _8H  = 34;
    case _9H  = 35;
    case _10H = 36;
    case JH   = 37;
    case QH   = 38;
    case KH   = 39;

    // Spades (40–52)
    case AS   = 40;
    case _2S  = 41;
    case _3S  = 42;
    case _4S  = 43;
    case _5S  = 44;
    case _6S  = 45;
    case _7S  = 46;
    case _8S  = 47;
    case _9S  = 48;
    case _10S = 49;
    case JS   = 50;
    case QS   = 51;
    case KS   = 52;

    public function toArray(): array
    {
        return match ($this) {
            // Clubs (1–13)
            self::AC    => array_merge(['id' => 1],  Rank::ACE->toArray(),   Suit::CLUBS->toArray()),
            self::_2C   => array_merge(['id' => 2],  Rank::DEUCE->toArray(), Suit::CLUBS->toArray()),
            self::_3C   => array_merge(['id' => 3],  Rank::THREE->toArray(), Suit::CLUBS->toArray()),
            self::_4C   => array_merge(['id' => 4],  Rank::FOUR->toArray(),  Suit::CLUBS->toArray()),
            self::_5C   => array_merge(['id' => 5],  Rank::FIVE->toArray(),  Suit::CLUBS->toArray()),
            self::_6C   => array_merge(['id' => 6],  Rank::SIX->toArray(),   Suit::CLUBS->toArray()),
            self::_7C   => array_merge(['id' => 7],  Rank::SEVEN->toArray(), Suit::CLUBS->toArray()),
            self::_8C   => array_merge(['id' => 8],  Rank::EIGHT->toArray(), Suit::CLUBS->toArray()),
            self::_9C   => array_merge(['id' => 9],  Rank::NINE->toArray(),  Suit::CLUBS->toArray()),
            self::_10C  => array_merge(['id' => 10], Rank::TEN->toArray(),   Suit::CLUBS->toArray()),
            self::JC    => array_merge(['id' => 11], Rank::JACK->toArray(),  Suit::CLUBS->toArray()),
            self::QC    => array_merge(['id' => 12], Rank::QUEEN->toArray(), Suit::CLUBS->toArray()),
            self::KC    => array_merge(['id' => 13], Rank::KING->toArray(),  Suit::CLUBS->toArray()),

            // Diamonds (14–26)
            self::AD    => array_merge(['id' => 14], Rank::ACE->toArray(),   Suit::DIAMONDS->toArray()),
            self::_2D   => array_merge(['id' => 15], Rank::DEUCE->toArray(), Suit::DIAMONDS->toArray()),
            self::_3D   => array_merge(['id' => 16], Rank::THREE->toArray(), Suit::DIAMONDS->toArray()),
            self::_4D   => array_merge(['id' => 17], Rank::FOUR->toArray(),  Suit::DIAMONDS->toArray()),
            self::_5D   => array_merge(['id' => 18], Rank::FIVE->toArray(),  Suit::DIAMONDS->toArray()),
            self::_6D   => array_merge(['id' => 19], Rank::SIX->toArray(),   Suit::DIAMONDS->toArray()),
            self::_7D   => array_merge(['id' => 20], Rank::SEVEN->toArray(), Suit::DIAMONDS->toArray()),
            self::_8D   => array_merge(['id' => 21], Rank::EIGHT->toArray(), Suit::DIAMONDS->toArray()),
            self::_9D   => array_merge(['id' => 22], Rank::NINE->toArray(),  Suit::DIAMONDS->toArray()),
            self::_10D  => array_merge(['id' => 23], Rank::TEN->toArray(),   Suit::DIAMONDS->toArray()),
            self::JD    => array_merge(['id' => 24], Rank::JACK->toArray(),  Suit::DIAMONDS->toArray()),
            self::QD    => array_merge(['id' => 25], Rank::QUEEN->toArray(), Suit::DIAMONDS->toArray()),
            self::KD    => array_merge(['id' => 26], Rank::KING->toArray(),  Suit::DIAMONDS->toArray()),

            // Hearts (27–39)
            self::AH    => array_merge(['id' => 27], Rank::ACE->toArray(),   Suit::HEARTS->toArray()),
            self::_2H   => array_merge(['id' => 28], Rank::DEUCE->toArray(), Suit::HEARTS->toArray()),
            self::_3H   => array_merge(['id' => 29], Rank::THREE->toArray(), Suit::HEARTS->toArray()),
            self::_4H   => array_merge(['id' => 30], Rank::FOUR->toArray(),  Suit::HEARTS->toArray()),
            self::_5H   => array_merge(['id' => 31], Rank::FIVE->toArray(),  Suit::HEARTS->toArray()),
            self::_6H   => array_merge(['id' => 32], Rank::SIX->toArray(),   Suit::HEARTS->toArray()),
            self::_7H   => array_merge(['id' => 33], Rank::SEVEN->toArray(), Suit::HEARTS->toArray()),
            self::_8H   => array_merge(['id' => 34], Rank::EIGHT->toArray(), Suit::HEARTS->toArray()),
            self::_9H   => array_merge(['id' => 35], Rank::NINE->toArray(),  Suit::HEARTS->toArray()),
            self::_10H  => array_merge(['id' => 36], Rank::TEN->toArray(),   Suit::HEARTS->toArray()),
            self::JH    => array_merge(['id' => 37], Rank::JACK->toArray(),  Suit::HEARTS->toArray()),
            self::QH    => array_merge(['id' => 38], Rank::QUEEN->toArray(), Suit::HEARTS->toArray()),
            self::KH    => array_merge(['id' => 39], Rank::KING->toArray(),  Suit::HEARTS->toArray()),

            // Spades (40–52)
            self::AS    => array_merge(['id' => 40], Rank::ACE->toArray(),   Suit::SPADES->toArray()),
            self::_2S   => array_merge(['id' => 41], Rank::DEUCE->toArray(), Suit::SPADES->toArray()),
            self::_3S   => array_merge(['id' => 42], Rank::THREE->toArray(), Suit::SPADES->toArray()),
            self::_4S   => array_merge(['id' => 43], Rank::FOUR->toArray(),  Suit::SPADES->toArray()),
            self::_5S   => array_merge(['id' => 44], Rank::FIVE->toArray(),  Suit::SPADES->toArray()),
            self::_6S   => array_merge(['id' => 45], Rank::SIX->toArray(),   Suit::SPADES->toArray()),
            self::_7S   => array_merge(['id' => 46], Rank::SEVEN->toArray(), Suit::SPADES->toArray()),
            self::_8S   => array_merge(['id' => 47], Rank::EIGHT->toArray(), Suit::SPADES->toArray()),
            self::_9S   => array_merge(['id' => 48], Rank::NINE->toArray(),  Suit::SPADES->toArray()),
            self::_10S  => array_merge(['id' => 49], Rank::TEN->toArray(),   Suit::SPADES->toArray()),
            self::JS    => array_merge(['id' => 50], Rank::JACK->toArray(),  Suit::SPADES->toArray()),
            self::QS    => array_merge(['id' => 51], Rank::QUEEN->toArray(), Suit::SPADES->toArray()),
            self::KS    => array_merge(['id' => 52], Rank::KING->toArray(),  Suit::SPADES->toArray()),
        };
    }

    public static function toIds(): array
    {
        return collect(self::cases())->map(fn ($card) => $card->value)->toArray();
    }
}
