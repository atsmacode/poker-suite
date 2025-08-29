<?php

namespace App\Http\Requests;

use App\Input\GameSetupInput;
use Illuminate\Foundation\Http\FormRequest;

class GameSetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'table.name' => ['string'],
            'table.seats' => ['required', 'integer'],
            'game.style' => ['string'],
            'scenario.id' => ['nullable', 'integer'],
            'players' => ['array'],
            'players.*' => ['integer'],
        ];
    }

    public function toInput(): GameSetupInput
    {
        return new GameSetupInput(
            scenarioId: $this->input('scenario.id'),
            gameId: $this->input('id'),
            seats: $this->input('table.seats'),
            players: $this->input('players')
        );
    }
}
