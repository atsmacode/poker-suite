<?php

namespace App\Input;

class GameSetupInput
{
    public function __construct(
        public string $tableName,
        public int $seats = 6,
        public string $gameStyle = 'plhe',
        public string $gameMode = 'test'
    ) {}
}
