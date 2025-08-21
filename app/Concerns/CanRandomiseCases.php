<?php

namespace App\Concerns;

use Illuminate\Support\Arr;

trait CanRandomiseCases
{
    public static function random(): self
    {
        return Arr::random(self::cases());
    }
}