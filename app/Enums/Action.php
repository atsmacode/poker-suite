<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Action: int
{
    use CanRandomiseCases;

    case FOLD  = 1;
    case CHECK = 2;
    case CALL  = 3;
    case BET   = 4;
    case RAISE = 5;

    public function toArray(): array
    {
        return [
            'id'   => $this->value,
            'name' => $this->name(),
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::FOLD  => 'Fold',
            self::CHECK => 'Check',
            self::CALL  => 'Call',
            self::BET   => 'Bet',
            self::RAISE => 'Raise',
        };
    }
}
