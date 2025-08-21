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
        return match ($this->value) {
            'fold' => [
                'id' => self::FOLD_ID,
                'name' => 'Fold',
            ],
            'check' => [
                'id' => self::CHECK_ID,
                'name' => 'Check',
            ],
            'call' => [
                'id' => self::CALL_ID,
                'name' => 'Call',
            ],
            'bet' => [
                'id' => self::BET_ID,
                'name' => 'Bet',
            ],
            'raise' => [
                'id' => self::RAISE_ID,
                'name' => 'Raise',
            ],
        };
    }
}
