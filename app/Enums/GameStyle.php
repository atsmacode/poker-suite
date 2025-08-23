<?php

namespace App\Enums;

enum GameStyle: int
{
    case PLHE = 1;
    case NLHE = 2; 

    public function abbreviation(): string
    {
        return match ($this) {
            self::PLHE => 'plhe',
            self::NLHE => 'nlhe',
        };
    }

    public static function fromAbbrev(string $abbreviation): self
    {
        return match ($abbreviation) {
            'plhe' => self::PLHE,
            'nlhe' => self::NLHE,
        };
    }

    public function name(): string
    {
        return match ($this) {
            self::PLHE => 'Pot-limit Texas Hold-em',
            self::NLHE => 'No-limit Texas Hold-em',
        };
    }
}
