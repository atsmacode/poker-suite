<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Card: string
{
    use CanRandomiseCases;

    // Clubs
    case ACE_CLUBS   = 'AC';
    case DEUCE_CLUBS = '2C';
    case THREE_CLUBS = '3C';
    case FOUR_CLUBS  = '4C';
    case FIVE_CLUBS  = '5C';
    case SIX_CLUBS   = '6C';
    case SEVEN_CLUBS = '7C';
    case EIGHT_CLUBS = '8C';
    case NINE_CLUBS  = '9C';
    case TEN_CLUBS   = 'TC';
    case JACK_CLUBS  = 'JC';
    case QUEEN_CLUBS = 'QC';
    case KING_CLUBS  = 'KC';

    // Diamonds
    case ACE_DIAMONDS   = 'AD';
    case DEUCE_DIAMONDS = '2D';
    case THREE_DIAMONDS = '3D';
    case FOUR_DIAMONDS  = '4D';
    case FIVE_DIAMONDS  = '5D';
    case SIX_DIAMONDS   = '6D';
    case SEVEN_DIAMONDS = '7D';
    case EIGHT_DIAMONDS = '8D';
    case NINE_DIAMONDS  = '9D';
    case TEN_DIAMONDS   = 'TD';
    case JACK_DIAMONDS  = 'JD';
    case QUEEN_DIAMONDS = 'QD';
    case KING_DIAMONDS  = 'KD';

    // Hearts
    case ACE_HEARTS   = 'AH';
    case DEUCE_HEARTS = '2H';
    case THREE_HEARTS = '3H';
    case FOUR_HEARTS  = '4H';
    case FIVE_HEARTS  = '5H';
    case SIX_HEARTS   = '6H';
    case SEVEN_HEARTS = '7H';
    case EIGHT_HEARTS = '8H';
    case NINE_HEARTS  = '9H';
    case TEN_HEARTS   = 'TH';
    case JACK_HEARTS  = 'JH';
    case QUEEN_HEARTS = 'QH';
    case KING_HEARTS  = 'KH';

    // Spades
    case ACE_SPADES   = 'AS';
    case DEUCE_SPADES = '2S';
    case THREE_SPADES = '3S';
    case FOUR_SPADES  = '4S';
    case FIVE_SPADES  = '5S';
    case SIX_SPADES   = '6S';
    case SEVEN_SPADES = '7S';
    case EIGHT_SPADES = '8S';
    case NINE_SPADES  = '9S';
    case TEN_SPADES   = 'TS';
    case JACK_SPADES  = 'JS';
    case QUEEN_SPADES = 'QS';
    case KING_SPADES  = 'KS';

    public function toArray(): array
    {
        return match ($this) {
            // Clubs (1–13)
            self::ACE_CLUBS   => array_merge(['id' => 1],  Rank::ACE->toArray(),   Suit::CLUBS->toArray()),
            self::DEUCE_CLUBS => array_merge(['id' => 2],  Rank::DEUCE->toArray(), Suit::CLUBS->toArray()),
            self::THREE_CLUBS => array_merge(['id' => 3],  Rank::THREE->toArray(), Suit::CLUBS->toArray()),
            self::FOUR_CLUBS  => array_merge(['id' => 4],  Rank::FOUR->toArray(),  Suit::CLUBS->toArray()),
            self::FIVE_CLUBS  => array_merge(['id' => 5],  Rank::FIVE->toArray(),  Suit::CLUBS->toArray()),
            self::SIX_CLUBS   => array_merge(['id' => 6],  Rank::SIX->toArray(),   Suit::CLUBS->toArray()),
            self::SEVEN_CLUBS => array_merge(['id' => 7],  Rank::SEVEN->toArray(), Suit::CLUBS->toArray()),
            self::EIGHT_CLUBS => array_merge(['id' => 8],  Rank::EIGHT->toArray(), Suit::CLUBS->toArray()),
            self::NINE_CLUBS  => array_merge(['id' => 9],  Rank::NINE->toArray(),  Suit::CLUBS->toArray()),
            self::TEN_CLUBS   => array_merge(['id' => 10], Rank::TEN->toArray(),   Suit::CLUBS->toArray()),
            self::JACK_CLUBS  => array_merge(['id' => 11], Rank::JACK->toArray(),  Suit::CLUBS->toArray()),
            self::QUEEN_CLUBS => array_merge(['id' => 12], Rank::QUEEN->toArray(), Suit::CLUBS->toArray()),
            self::KING_CLUBS  => array_merge(['id' => 13], Rank::KING->toArray(),  Suit::CLUBS->toArray()),

            // Diamonds (14–26)
            self::ACE_DIAMONDS   => array_merge(['id' => 14], Rank::ACE->toArray(),   Suit::DIAMONDS->toArray()),
            self::DEUCE_DIAMONDS => array_merge(['id' => 15], Rank::DEUCE->toArray(), Suit::DIAMONDS->toArray()),
            self::THREE_DIAMONDS => array_merge(['id' => 16], Rank::THREE->toArray(), Suit::DIAMONDS->toArray()),
            self::FOUR_DIAMONDS  => array_merge(['id' => 17], Rank::FOUR->toArray(),  Suit::DIAMONDS->toArray()),
            self::FIVE_DIAMONDS  => array_merge(['id' => 18], Rank::FIVE->toArray(),  Suit::DIAMONDS->toArray()),
            self::SIX_DIAMONDS   => array_merge(['id' => 19], Rank::SIX->toArray(),   Suit::DIAMONDS->toArray()),
            self::SEVEN_DIAMONDS => array_merge(['id' => 20], Rank::SEVEN->toArray(), Suit::DIAMONDS->toArray()),
            self::EIGHT_DIAMONDS => array_merge(['id' => 21], Rank::EIGHT->toArray(), Suit::DIAMONDS->toArray()),
            self::NINE_DIAMONDS  => array_merge(['id' => 22], Rank::NINE->toArray(),  Suit::DIAMONDS->toArray()),
            self::TEN_DIAMONDS   => array_merge(['id' => 23], Rank::TEN->toArray(),   Suit::DIAMONDS->toArray()),
            self::JACK_DIAMONDS  => array_merge(['id' => 24], Rank::JACK->toArray(),  Suit::DIAMONDS->toArray()),
            self::QUEEN_DIAMONDS => array_merge(['id' => 25], Rank::QUEEN->toArray(), Suit::DIAMONDS->toArray()),
            self::KING_DIAMONDS  => array_merge(['id' => 26], Rank::KING->toArray(),  Suit::DIAMONDS->toArray()),

            // Hearts (27–39)
            self::ACE_HEARTS   => array_merge(['id' => 27], Rank::ACE->toArray(),   Suit::HEARTS->toArray()),
            self::DEUCE_HEARTS => array_merge(['id' => 28], Rank::DEUCE->toArray(), Suit::HEARTS->toArray()),
            self::THREE_HEARTS => array_merge(['id' => 29], Rank::THREE->toArray(), Suit::HEARTS->toArray()),
            self::FOUR_HEARTS  => array_merge(['id' => 30], Rank::FOUR->toArray(),  Suit::HEARTS->toArray()),
            self::FIVE_HEARTS  => array_merge(['id' => 31], Rank::FIVE->toArray(),  Suit::HEARTS->toArray()),
            self::SIX_HEARTS   => array_merge(['id' => 32], Rank::SIX->toArray(),   Suit::HEARTS->toArray()),
            self::SEVEN_HEARTS => array_merge(['id' => 33], Rank::SEVEN->toArray(), Suit::HEARTS->toArray()),
            self::EIGHT_HEARTS => array_merge(['id' => 34], Rank::EIGHT->toArray(), Suit::HEARTS->toArray()),
            self::NINE_HEARTS  => array_merge(['id' => 35], Rank::NINE->toArray(),  Suit::HEARTS->toArray()),
            self::TEN_HEARTS   => array_merge(['id' => 36], Rank::TEN->toArray(),   Suit::HEARTS->toArray()),
            self::JACK_HEARTS  => array_merge(['id' => 37], Rank::JACK->toArray(),  Suit::HEARTS->toArray()),
            self::QUEEN_HEARTS => array_merge(['id' => 38], Rank::QUEEN->toArray(), Suit::HEARTS->toArray()),
            self::KING_HEARTS  => array_merge(['id' => 39], Rank::KING->toArray(),  Suit::HEARTS->toArray()),

            // Spades (40–52)
            self::ACE_SPADES   => array_merge(['id' => 40], Rank::ACE->toArray(),   Suit::SPADES->toArray()),
            self::DEUCE_SPADES => array_merge(['id' => 41], Rank::DEUCE->toArray(), Suit::SPADES->toArray()),
            self::THREE_SPADES => array_merge(['id' => 42], Rank::THREE->toArray(), Suit::SPADES->toArray()),
            self::FOUR_SPADES  => array_merge(['id' => 43], Rank::FOUR->toArray(),  Suit::SPADES->toArray()),
            self::FIVE_SPADES  => array_merge(['id' => 44], Rank::FIVE->toArray(),  Suit::SPADES->toArray()),
            self::SIX_SPADES   => array_merge(['id' => 45], Rank::SIX->toArray(),   Suit::SPADES->toArray()),
            self::SEVEN_SPADES => array_merge(['id' => 46], Rank::SEVEN->toArray(), Suit::SPADES->toArray()),
            self::EIGHT_SPADES => array_merge(['id' => 47], Rank::EIGHT->toArray(), Suit::SPADES->toArray()),
            self::NINE_SPADES  => array_merge(['id' => 48], Rank::NINE->toArray(),  Suit::SPADES->toArray()),
            self::TEN_SPADES   => array_merge(['id' => 49], Rank::TEN->toArray(),   Suit::SPADES->toArray()),
            self::JACK_SPADES  => array_merge(['id' => 50], Rank::JACK->toArray(),  Suit::SPADES->toArray()),
            self::QUEEN_SPADES => array_merge(['id' => 51], Rank::QUEEN->toArray(), Suit::SPADES->toArray()),
            self::KING_SPADES  => array_merge(['id' => 52], Rank::KING->toArray(),  Suit::SPADES->toArray()),
        };
    }
}
