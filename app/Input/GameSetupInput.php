<?php

namespace App\Input;

class GameSetupInput
{
    public function __construct(
        public ?int $gameId,
        public string $tableName = 'Test Table',
        public int $seats = 6,
        public string $gameStyle = 'plhe',
        public string $gameMode = 'test'
    ) {}
}
