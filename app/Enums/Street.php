<?php

namespace App\Enums;

use App\Concerns\CanRandomiseCases;

enum Street: int
{
    use CanRandomiseCases;

    case PRE_FLOP = 1;
    case FLOP     = 2;
    case TURN     = 3;
    case RIVER    = 4;

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
            self::PRE_FLOP => 'Pre-flop',
            self::FLOP     => 'Flop',
            self::TURN     => 'Turn',
            self::RIVER    => 'River',
        };
    }
}
