<?php

namespace App\Http\Requests;

use App\Input\ScenarioSetupInput;
use Illuminate\Foundation\Http\FormRequest;

class ScenarioSetupRequest extends FormRequest
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
            'game.id' => ['nullable', 'integer'],
            'game.style' => ['string'],
            'scenario.id' => ['nullable', 'integer'],
            'table.name' => ['string'],
            'table.seats' => ['required', 'integer'],
            'players' => ['nullable', 'array'],
            'players.*' => ['integer'],
        ];
    }

    public function toInput(): ScenarioSetupInput
    {
        return new ScenarioSetupInput(
            gameId: $this->input('game.id'),
            scenarioId: $this->input('scenario.id'),
            seats: $this->input('table.seats')
        );
    }
}
