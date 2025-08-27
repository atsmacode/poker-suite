<?php

namespace App\Input;

class GameSetupInput
{
    public function __construct(
        public string $tableName = 'Test Table',
        public int $seats = 6,
        public string $gameStyle = 'plhe',
        public ?int $gameId,
        public ?string $gameMode = 'test'
    ) {}
}
