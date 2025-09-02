<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameStateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $state = $this->resource;
        $game = $state->getGame();

        $response = [
            'id' => $game->id,
            'seats' => $state->getSeats(),
            'players' => $state->getPlayers(),
            'scenario' => null,
        ];

        if ($state->isScenario()) {
            $scenario = $state->getScenario();

            $response['scenario'] = [
                'id' => $scenario->id,
                'name' => $scenario->name
            ];
        }

        return $response;
    }
}
