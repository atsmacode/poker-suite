<?php

namespace App\Enums;

enum GameStyle: int
{
    case PLHE = 1;
    case NLHE = 2; 

    public function name(): string
    {
        return match ($this) {
            self::PLHE => 'plhe',
            self::NLHE => 'nlhe',
        };
    }

    public static function fromName(string $name): self
    {
        return match ($name) {
            'plhe' => self::PLHE,
            'nlhe' => self::NLHE,
        };
    }
}
