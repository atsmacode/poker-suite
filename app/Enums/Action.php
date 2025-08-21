<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Action: string
{
    use CanRandomiseCases;

    case FOLD = 'fold';
    case CHECK = 'check';
    case CALL = 'call';
    case BET = 'bet';
    case RAISE = 'raise';

    public const FOLD_ID = 1;
    public const CHECK_ID = 2;
    public const CALL_ID = 3;
    public const BET_ID = 4;
    public const RAISE_ID = 5;

    public function toArray(): array
    {
        return match ($this) {
            self::FOLD => [
                'id' => self::FOLD_ID,
                'name' => 'Fold',
            ],
            self::CHECK => [
                'id' => self::CHECK_ID,
                'name' => 'Check',
            ],
            self::CALL => [
                'id' => self::CALL_ID,
                'name' => 'Call',
            ],
            self::BET => [
                'id' => self::BET_ID,
                'name' => 'Bet',
            ],
            self::RAISE => [
                'id' => self::RAISE_ID,
                'name' => 'Raise',
            ],
        };
    }
}
