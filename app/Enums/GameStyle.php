<?php

namespace App\Enums;

enum GameStyle: int
{
    case HOLD_EM = 1;
    case STUD_SEVEN = 2;

    public function abbreviation(): string
    {
        return match ($this) {
            self::HOLD_EM => 'hold_em',
            self::STUD_SEVEN => 'stud_seven',
        };
    }

    public static function fromAbbrev(string $abbreviation): self
    {
        return match ($abbreviation) {
            'hold_em' => self::HOLD_EM,
            'stud_seven' => self::STUD_SEVEN,
        };
    }

    public function settings(): array
    {
        return match ($this) {
            self::HOLD_EM => [
                'id' => $this->value,
                'name' => 'Texas Hold-em',
                'abbreviation' => 'hold_em',
                'streets' => [
                    [
                        'name' => 'Pre-flop',
                        'sequence' => 1,
                        'hole_cards' => 2,
                        'face_up_hole_count' => 0,
                        'community_cards' => 0,
                    ],
                    [
                        'name' => 'Flop',
                        'sequence' => 2,
                        'hole_cards' => 0,
                        'face_up_hole_count' => 0,
                        'community_cards' => 3,
                    ],
                    [
                        'name' => 'Turn',
                        'sequence' => 3,
                        'hole_cards' => 0,
                        'face_up_hole_count' => 0,
                        'community_cards' => 1,
                    ],
                    [
                        'name' => 'River',
                        'sequence' => 4,
                        'hole_cards' => 0,
                        'face_up_hole_count' => 0,
                        'community_cards' => 1,
                    ]
                ]
            ],
            self::STUD_SEVEN => [
                'id' => $this->value,
                'name' => 'Seven Card Stud',
                'abbreviation' => 'stud_seven',
                'streets' => [
                    [
                        'name' => 'Third Street',
                        'sequence' => 1,
                        'hole_cards' => 3,
                        'face_up_hole_count' => 1,
                        'community_cards' => 0,
                    ],
                    [
                        'name' => 'Fourth Street',
                        'sequence' => 2,
                        'hole_cards' => 1,
                        'face_up_hole_count' => 1,
                        'community_cards' => 0,
                    ],
                    [
                        'name' => 'Fifth Street',
                        'sequence' => 3,
                        'hole_cards' => 1,
                        'face_up_hole_count' => 1,
                        'community_cards' => 0,
                    ],
                    [
                        'name' => 'Sixth Street',
                        'sequence' => 4,
                        'hole_cards' => 1,
                        'face_up_hole_count' => 1,
                        'community_cards' => 0,
                    ],
                    [
                        'name' => 'Seventh Street',
                        'sequence' => 5,
                        'hole_cards' => 1,
                        'face_up_hole_count' => 1,
                        'community_cards' => 0,
                    ],
                ]
            ],
        };
    }
}
