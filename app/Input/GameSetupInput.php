<?php

namespace App\Input;

class GameSetupInput
{
    /**
     * Optional list of specific player IDs. Omit to auto-generate.
     *
     * @param array<int>
     */
    public ?array $players = [];

    public function __construct(
        public string $tableName = 'Test Table',
        public int $seats = 6,
        public string $gameStyle = 'hold_em',
        public string $gameMode = 'test',
        ?array $players = []
    ) {
        $this->players = $players;
    }
}
