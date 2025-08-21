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
            self::ACE_CLUBS   => ['id' => self::ACE_CLUBS_ID,   'rank' => Rank::ACE,   'suit' => Suit::CLUBS],
            self::DEUCE_CLUBS => ['id' => self::DEUCE_CLUBS_ID, 'rank' => Rank::DEUCE, 'suit' => Suit::CLUBS],
            self::THREE_CLUBS => ['id' => self::THREE_CLUBS_ID, 'rank' => Rank::THREE, 'suit' => Suit::CLUBS],
            self::FOUR_CLUBS  => ['id' => self::FOUR_CLUBS_ID,  'rank' => Rank::FOUR,  'suit' => Suit::CLUBS],
            self::FIVE_CLUBS  => ['id' => self::FIVE_CLUBS_ID,  'rank' => Rank::FIVE,  'suit' => Suit::CLUBS],
            self::SIX_CLUBS   => ['id' => self::SIX_CLUBS_ID,   'rank' => Rank::SIX,   'suit' => Suit::CLUBS],
            self::SEVEN_CLUBS => ['id' => self::SEVEN_CLUBS_ID, 'rank' => Rank::SEVEN, 'suit' => Suit::CLUBS],
            self::EIGHT_CLUBS => ['id' => self::EIGHT_CLUBS_ID, 'rank' => Rank::EIGHT, 'suit' => Suit::CLUBS],
            self::NINE_CLUBS  => ['id' => self::NINE_CLUBS_ID,  'rank' => Rank::NINE,  'suit' => Suit::CLUBS],
            self::TEN_CLUBS   => ['id' => self::TEN_CLUBS_ID,   'rank' => Rank::TEN,   'suit' => Suit::CLUBS],
            self::JACK_CLUBS  => ['id' => self::JACK_CLUBS_ID,  'rank' => Rank::JACK,  'suit' => Suit::CLUBS],
            self::QUEEN_CLUBS => ['id' => self::QUEEN_CLUBS_ID, 'rank' => Rank::QUEEN, 'suit' => Suit::CLUBS],
            self::KING_CLUBS  => ['id' => self::KING_CLUBS_ID,  'rank' => Rank::KING,  'suit' => Suit::CLUBS],

            // Diamonds
            self::ACE_DIAMONDS   => ['id' => self::ACE_DIAMONDS_ID,   'rank' => Rank::ACE,   'suit' => Suit::DIAMONDS],
            self::DEUCE_DIAMONDS => ['id' => self::DEUCE_DIAMONDS_ID, 'rank' => Rank::DEUCE, 'suit' => Suit::DIAMONDS],
            self::THREE_DIAMONDS => ['id' => self::THREE_DIAMONDS_ID, 'rank' => Rank::THREE, 'suit' => Suit::DIAMONDS],
            self::FOUR_DIAMONDS  => ['id' => self::FOUR_DIAMONDS_ID,  'rank' => Rank::FOUR,  'suit' => Suit::DIAMONDS],
            self::FIVE_DIAMONDS  => ['id' => self::FIVE_DIAMONDS_ID,  'rank' => Rank::FIVE,  'suit' => Suit::DIAMONDS],
            self::SIX_DIAMONDS   => ['id' => self::SIX_DIAMONDS_ID,   'rank' => Rank::SIX,   'suit' => Suit::DIAMONDS],
            self::SEVEN_DIAMONDS => ['id' => self::SEVEN_DIAMONDS_ID, 'rank' => Rank::SEVEN, 'suit' => Suit::DIAMONDS],
            self::EIGHT_DIAMONDS => ['id' => self::EIGHT_DIAMONDS_ID, 'rank' => Rank::EIGHT, 'suit' => Suit::DIAMONDS],
            self::NINE_DIAMONDS  => ['id' => self::NINE_DIAMONDS_ID,  'rank' => Rank::NINE,  'suit' => Suit::DIAMONDS],
            self::TEN_DIAMONDS   => ['id' => self::TEN_DIAMONDS_ID,   'rank' => Rank::TEN,   'suit' => Suit::DIAMONDS],
            self::JACK_DIAMONDS  => ['id' => self::JACK_DIAMONDS_ID,  'rank' => Rank::JACK,  'suit' => Suit::DIAMONDS],
            self::QUEEN_DIAMONDS => ['id' => self::QUEEN_DIAMONDS_ID, 'rank' => Rank::QUEEN, 'suit' => Suit::DIAMONDS],
            self::KING_DIAMONDS  => ['id' => self::KING_DIAMONDS_ID,  'rank' => Rank::KING,  'suit' => Suit::DIAMONDS],

            // Hearts
            self::ACE_HEARTS   => ['id' => self::ACE_HEARTS_ID,   'rank' => Rank::ACE,   'suit' => Suit::HEARTS],
            self::DEUCE_HEARTS => ['id' => self::DEUCE_HEARTS_ID, 'rank' => Rank::DEUCE, 'suit' => Suit::HEARTS],
            self::THREE_HEARTS => ['id' => self::THREE_HEARTS_ID, 'rank' => Rank::THREE, 'suit' => Suit::HEARTS],
            self::FOUR_HEARTS  => ['id' => self::FOUR_HEARTS_ID,  'rank' => Rank::FOUR,  'suit' => Suit::HEARTS],
            self::FIVE_HEARTS  => ['id' => self::FIVE_HEARTS_ID,  'rank' => Rank::FIVE,  'suit' => Suit::HEARTS],
            self::SIX_HEARTS   => ['id' => self::SIX_HEARTS_ID,   'rank' => Rank::SIX,   'suit' => Suit::HEARTS],
            self::SEVEN_HEARTS => ['id' => self::SEVEN_HEARTS_ID, 'rank' => Rank::SEVEN, 'suit' => Suit::HEARTS],
            self::EIGHT_HEARTS => ['id' => self::EIGHT_HEARTS_ID, 'rank' => Rank::EIGHT, 'suit' => Suit::HEARTS],
            self::NINE_HEARTS  => ['id' => self::NINE_HEARTS_ID,  'rank' => Rank::NINE,  'suit' => Suit::HEARTS],
            self::TEN_HEARTS   => ['id' => self::TEN_HEARTS_ID,   'rank' => Rank::TEN,   'suit' => Suit::HEARTS],
            self::JACK_HEARTS  => ['id' => self::JACK_HEARTS_ID,  'rank' => Rank::JACK,  'suit' => Suit::HEARTS],
            self::QUEEN_HEARTS => ['id' => self::QUEEN_HEARTS_ID, 'rank' => Rank::QUEEN, 'suit' => Suit::HEARTS],
            self::KING_HEARTS  => ['id' => self::KING_HEARTS_ID,  'rank' => Rank::KING,  'suit' => Suit::HEARTS],

            // Spades
            self::ACE_SPADES   => ['id' => self::ACE_SPADES_ID,   'rank' => Rank::ACE,   'suit' => Suit::SPADES],
            self::DEUCE_SPADES => ['id' => self::DEUCE_SPADES_ID, 'rank' => Rank::DEUCE, 'suit' => Suit::SPADES],
            self::THREE_SPADES => ['id' => self::THREE_SPADES_ID, 'rank' => Rank::THREE, 'suit' => Suit::SPADES],
            self::FOUR_SPADES  => ['id' => self::FOUR_SPADES_ID,  'rank' => Rank::FOUR,  'suit' => Suit::SPADES],
            self::FIVE_SPADES  => ['id' => self::FIVE_SPADES_ID,  'rank' => Rank::FIVE,  'suit' => Suit::SPADES],
            self::SIX_SPADES   => ['id' => self::SIX_SPADES_ID,   'rank' => Rank::SIX,   'suit' => Suit::SPADES],
            self::SEVEN_SPADES => ['id' => self::SEVEN_SPADES_ID, 'rank' => Rank::SEVEN, 'suit' => Suit::SPADES],
            self::EIGHT_SPADES => ['id' => self::EIGHT_SPADES_ID, 'rank' => Rank::EIGHT, 'suit' => Suit::SPADES],
            self::NINE_SPADES  => ['id' => self::NINE_SPADES_ID,  'rank' => Rank::NINE,  'suit' => Suit::SPADES],
            self::TEN_SPADES   => ['id' => self::TEN_SPADES_ID,   'rank' => Rank::TEN,   'suit' => Suit::SPADES],
            self::JACK_SPADES  => ['id' => self::JACK_SPADES_ID,  'rank' => Rank::JACK,  'suit' => Suit::SPADES],
            self::QUEEN_SPADES => ['id' => self::QUEEN_SPADES_ID, 'rank' => Rank::QUEEN, 'suit' => Suit::SPADES],
            self::KING_SPADES  => ['id' => self::KING_SPADES_ID,  'rank' => Rank::KING,  'suit' => Suit::SPADES],
        };
    }
}
