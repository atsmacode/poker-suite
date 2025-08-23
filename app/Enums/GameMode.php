<?php

namespace App\Enums;

enum GameMode: int
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

    public static function fromName(string $name): self
    {
        return match ($name) {
            'test' => self::TEST,
            'real' => self::REAL,
            'ai' => self::AI,
        };
    }
}
