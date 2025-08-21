<?php

namespace App\Enums;

enum Mode: int
{
    case TEST = 1;
    case REAL = 2;
    case AI = 3;

    public function name(): string
    {
        return match ($this) {
            self::TEST => 'test',
            self::REAL => 'real',
            self::AI => 'ai',
        };
    }
}
