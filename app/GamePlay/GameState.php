<?php

namespace App\GamePlay;

use App\Models\Game;
use App\Models\Scenario;
use Illuminate\Database\Eloquent\Collection;

class GameState
{
    private Game $game;
    private ?Scenario $scenario;

    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setScenario(Scenario $scenario): void
    {
        $this->scenario = $scenario;
    }

    public function getScenario(): ?Scenario
    {
        return $this->scenario;
    }

    public static function fromGame(Game $game): self
    {
        $state = new self;
        $state->setGame($game);

        return $state;
    }

    public static function fromScenario(Scenario $scenario): self
    {
        $state = new self;
        $state->setScenario($scenario);
        $state->game = $scenario->game;

        return $state;
    }

    public function isScenario(): bool
    {
        return isset($this->scenario);
    }

    public function getSeats(): Collection
    {
        return $this->game->gameTable->tableSeats;
    }

    public function getPlayers(): Collection
    {
        return $this->game
            ->getPlayers()
            ->keyBy
            ->id;
    }
}