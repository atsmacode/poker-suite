<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum Street: string
{
    case PRE_FLOP = 'pre_flop';
    case FLOP = 'flop';
    case TURN = 'turn';
    case RIVER = 'river';

    public const PRE_FLOP_ID = 1;
    public const FLOP_ID = 2;
    public const TURN_ID = 3;
    public const RIVER_ID = 4;

    public function toArray(): array
    {
        return match ($this->value) {
            'pre_flop' => [
                'id' => self::PRE_FLOP_ID,
                'name' => 'Pre-flop',
            ],
            'flop' => [
                'id' => self::FLOP_ID,
                'name' => 'Flop',
            ],
            'turn' => [
                'id' => self::TURN_ID,
                'name' => 'Turn',
            ],
            'river' => [
                'id' => self::RIVER_ID,
                'name' => 'River',
            ]
        };
    }

    public static function random(): self
    {
        return Arr::random(self::cases());
    }
}
