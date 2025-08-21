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

    // IDs
    public const ACE_CLUBS_ID   = 1;
    public const DEUCE_CLUBS_ID = 2;
    public const THREE_CLUBS_ID = 3;
    public const FOUR_CLUBS_ID  = 4;
    public const FIVE_CLUBS_ID  = 5;
    public const SIX_CLUBS_ID   = 6;
    public const SEVEN_CLUBS_ID = 7;
    public const EIGHT_CLUBS_ID = 8;
    public const NINE_CLUBS_ID  = 9;
    public const TEN_CLUBS_ID   = 10;
    public const JACK_CLUBS_ID  = 11;
    public const QUEEN_CLUBS_ID = 12;
    public const KING_CLUBS_ID  = 13;

    public const ACE_DIAMONDS_ID   = 14;
    public const DEUCE_DIAMONDS_ID = 15;
    public const THREE_DIAMONDS_ID = 16;
    public const FOUR_DIAMONDS_ID  = 17;
    public const FIVE_DIAMONDS_ID  = 18;
    public const SIX_DIAMONDS_ID   = 19;
    public const SEVEN_DIAMONDS_ID = 20;
    public const EIGHT_DIAMONDS_ID = 21;
    public const NINE_DIAMONDS_ID  = 22;
    public const TEN_DIAMONDS_ID   = 23;
    public const JACK_DIAMONDS_ID  = 24;
    public const QUEEN_DIAMONDS_ID = 25;
    public const KING_DIAMONDS_ID  = 26;

    public const ACE_HEARTS_ID   = 27;
    public const DEUCE_HEARTS_ID = 28;
    public const THREE_HEARTS_ID = 29;
    public const FOUR_HEARTS_ID  = 30;
    public const FIVE_HEARTS_ID  = 31;
    public const SIX_HEARTS_ID   = 32;
    public const SEVEN_HEARTS_ID = 33;
    public const EIGHT_HEARTS_ID = 34;
    public const NINE_HEARTS_ID  = 35;
    public const TEN_HEARTS_ID   = 36;
    public const JACK_HEARTS_ID  = 37;
    public const QUEEN_HEARTS_ID = 38;
    public const KING_HEARTS_ID  = 39;

    public const ACE_SPADES_ID   = 40;
    public const DEUCE_SPADES_ID = 41;
    public const THREE_SPADES_ID = 42;
    public const FOUR_SPADES_ID  = 43;
    public const FIVE_SPADES_ID  = 44;
    public const SIX_SPADES_ID   = 45;
    public const SEVEN_SPADES_ID = 46;
    public const EIGHT_SPADES_ID = 47;
    public const NINE_SPADES_ID  = 48;
    public const TEN_SPADES_ID   = 49;
    public const JACK_SPADES_ID  = 50;
    public const QUEEN_SPADES_ID = 51;
    public const KING_SPADES_ID  = 52;

    public function toArray(): array
{
    return match ($this) {
        // Clubs
        self::ACE_CLUBS   => array_merge(['id' => self::ACE_CLUBS_ID], Rank::ACE->toArray(), Suit::CLUBS->toArray()),
        self::DEUCE_CLUBS => array_merge(['id' => self::DEUCE_CLUBS_ID], Rank::DEUCE->toArray(), Suit::CLUBS->toArray()),
        self::THREE_CLUBS => array_merge(['id' => self::THREE_CLUBS_ID], Rank::THREE->toArray(), Suit::CLUBS->toArray()),
        self::FOUR_CLUBS  => array_merge(['id' => self::FOUR_CLUBS_ID],  Rank::FOUR->toArray(),  Suit::CLUBS->toArray()),
        self::FIVE_CLUBS  => array_merge(['id' => self::FIVE_CLUBS_ID],  Rank::FIVE->toArray(),  Suit::CLUBS->toArray()),
        self::SIX_CLUBS   => array_merge(['id' => self::SIX_CLUBS_ID],   Rank::SIX->toArray(),   Suit::CLUBS->toArray()),
        self::SEVEN_CLUBS => array_merge(['id' => self::SEVEN_CLUBS_ID], Rank::SEVEN->toArray(), Suit::CLUBS->toArray()),
        self::EIGHT_CLUBS => array_merge(['id' => self::EIGHT_CLUBS_ID], Rank::EIGHT->toArray(), Suit::CLUBS->toArray()),
        self::NINE_CLUBS  => array_merge(['id' => self::NINE_CLUBS_ID],  Rank::NINE->toArray(),  Suit::CLUBS->toArray()),
        self::TEN_CLUBS   => array_merge(['id' => self::TEN_CLUBS_ID],   Rank::TEN->toArray(),   Suit::CLUBS->toArray()),
        self::JACK_CLUBS  => array_merge(['id' => self::JACK_CLUBS_ID],  Rank::JACK->toArray(),  Suit::CLUBS->toArray()),
        self::QUEEN_CLUBS => array_merge(['id' => self::QUEEN_CLUBS_ID], Rank::QUEEN->toArray(), Suit::CLUBS->toArray()),
        self::KING_CLUBS  => array_merge(['id' => self::KING_CLUBS_ID],  Rank::KING->toArray(),  Suit::CLUBS->toArray()),

        // Diamonds
        self::ACE_DIAMONDS   => array_merge(['id' => self::ACE_DIAMONDS_ID],   Rank::ACE->toArray(),   Suit::DIAMONDS->toArray()),
        self::DEUCE_DIAMONDS => array_merge(['id' => self::DEUCE_DIAMONDS_ID], Rank::DEUCE->toArray(), Suit::DIAMONDS->toArray()),
        self::THREE_DIAMONDS => array_merge(['id' => self::THREE_DIAMONDS_ID], Rank::THREE->toArray(), Suit::DIAMONDS->toArray()),
        self::FOUR_DIAMONDS  => array_merge(['id' => self::FOUR_DIAMONDS_ID],  Rank::FOUR->toArray(),  Suit::DIAMONDS->toArray()),
        self::FIVE_DIAMONDS  => array_merge(['id' => self::FIVE_DIAMONDS_ID],  Rank::FIVE->toArray(),  Suit::DIAMONDS->toArray()),
        self::SIX_DIAMONDS   => array_merge(['id' => self::SIX_DIAMONDS_ID],   Rank::SIX->toArray(),   Suit::DIAMONDS->toArray()),
        self::SEVEN_DIAMONDS => array_merge(['id' => self::SEVEN_DIAMONDS_ID], Rank::SEVEN->toArray(), Suit::DIAMONDS->toArray()),
        self::EIGHT_DIAMONDS => array_merge(['id' => self::EIGHT_DIAMONDS_ID], Rank::EIGHT->toArray(), Suit::DIAMONDS->toArray()),
        self::NINE_DIAMONDS  => array_merge(['id' => self::NINE_DIAMONDS_ID],  Rank::NINE->toArray(),  Suit::DIAMONDS->toArray()),
        self::TEN_DIAMONDS   => array_merge(['id' => self::TEN_DIAMONDS_ID],   Rank::TEN->toArray(),   Suit::DIAMONDS->toArray()),
        self::JACK_DIAMONDS  => array_merge(['id' => self::JACK_DIAMONDS_ID],  Rank::JACK->toArray(),  Suit::DIAMONDS->toArray()),
        self::QUEEN_DIAMONDS => array_merge(['id' => self::QUEEN_DIAMONDS_ID], Rank::QUEEN->toArray(), Suit::DIAMONDS->toArray()),
        self::KING_DIAMONDS  => array_merge(['id' => self::KING_DIAMONDS_ID],  Rank::KING->toArray(),  Suit::DIAMONDS->toArray()),

        // Hearts
        self::ACE_HEARTS   => array_merge(['id' => self::ACE_HEARTS_ID],   Rank::ACE->toArray(),   Suit::HEARTS->toArray()),
        self::DEUCE_HEARTS => array_merge(['id' => self::DEUCE_HEARTS_ID], Rank::DEUCE->toArray(), Suit::HEARTS->toArray()),
        self::THREE_HEARTS => array_merge(['id' => self::THREE_HEARTS_ID], Rank::THREE->toArray(), Suit::HEARTS->toArray()),
        self::FOUR_HEARTS  => array_merge(['id' => self::FOUR_HEARTS_ID],  Rank::FOUR->toArray(),  Suit::HEARTS->toArray()),
        self::FIVE_HEARTS  => array_merge(['id' => self::FIVE_HEARTS_ID],  Rank::FIVE->toArray(),  Suit::HEARTS->toArray()),
        self::SIX_HEARTS   => array_merge(['id' => self::SIX_HEARTS_ID],   Rank::SIX->toArray(),   Suit::HEARTS->toArray()),
        self::SEVEN_HEARTS => array_merge(['id' => self::SEVEN_HEARTS_ID], Rank::SEVEN->toArray(), Suit::HEARTS->toArray()),
        self::EIGHT_HEARTS => array_merge(['id' => self::EIGHT_HEARTS_ID], Rank::EIGHT->toArray(), Suit::HEARTS->toArray()),
        self::NINE_HEARTS  => array_merge(['id' => self::NINE_HEARTS_ID],  Rank::NINE->toArray(),  Suit::HEARTS->toArray()),
        self::TEN_HEARTS   => array_merge(['id' => self::TEN_HEARTS_ID],   Rank::TEN->toArray(),   Suit::HEARTS->toArray()),
        self::JACK_HEARTS  => array_merge(['id' => self::JACK_HEARTS_ID],  Rank::JACK->toArray(),  Suit::HEARTS->toArray()),
        self::QUEEN_HEARTS => array_merge(['id' => self::QUEEN_HEARTS_ID], Rank::QUEEN->toArray(), Suit::HEARTS->toArray()),
        self::KING_HEARTS  => array_merge(['id' => self::KING_HEARTS_ID],  Rank::KING->toArray(),  Suit::HEARTS->toArray()),

        // Spades
        self::ACE_SPADES   => array_merge(['id' => self::ACE_SPADES_ID],   Rank::ACE->toArray(),   Suit::SPADES->toArray()),
        self::DEUCE_SPADES => array_merge(['id' => self::DEUCE_SPADES_ID], Rank::DEUCE->toArray(), Suit::SPADES->toArray()),
        self::THREE_SPADES => array_merge(['id' => self::THREE_SPADES_ID], Rank::THREE->toArray(), Suit::SPADES->toArray()),
        self::FOUR_SPADES  => array_merge(['id' => self::FOUR_SPADES_ID],  Rank::FOUR->toArray(),  Suit::SPADES->toArray()),
        self::FIVE_SPADES  => array_merge(['id' => self::FIVE_SPADES_ID],  Rank::FIVE->toArray(),  Suit::SPADES->toArray()),
        self::SIX_SPADES   => array_merge(['id' => self::SIX_SPADES_ID],   Rank::SIX->toArray(),   Suit::SPADES->toArray()),
        self::SEVEN_SPADES => array_merge(['id' => self::SEVEN_SPADES_ID], Rank::SEVEN->toArray(), Suit::SPADES->toArray()),
        self::EIGHT_SPADES => array_merge(['id' => self::EIGHT_SPADES_ID], Rank::EIGHT->toArray(), Suit::SPADES->toArray()),
        self::NINE_SPADES  => array_merge(['id' => self::NINE_SPADES_ID],  Rank::NINE->toArray(),  Suit::SPADES->toArray()),
        self::TEN_SPADES   => array_merge(['id' => self::TEN_SPADES_ID],   Rank::TEN->toArray(),   Suit::SPADES->toArray()),
        self::JACK_SPADES  => array_merge(['id' => self::JACK_SPADES_ID],  Rank::JACK->toArray(),  Suit::SPADES->toArray()),
        self::QUEEN_SPADES => array_merge(['id' => self::QUEEN_SPADES_ID], Rank::QUEEN->toArray(), Suit::SPADES->toArray()),
        self::KING_SPADES  => array_merge(['id' => self::KING_SPADES_ID],  Rank::KING->toArray(),  Suit::SPADES->toArray()),
    };
}

}
