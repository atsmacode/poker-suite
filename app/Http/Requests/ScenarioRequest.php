<?php

namespace App\Http\Requests;

use App\Input\GameSetupInput;
use Illuminate\Foundation\Http\FormRequest;

class ScenarioRequest extends FormRequest
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
            'table.name' => ['string'],
            'table.seats' => ['required', 'integer'],
            'game.style' => ['string'],
            'game.id' => ['nullable', 'integer'],
        ];
    }

    public function toInput(): GameSetupInput
    {
        return new GameSetupInput(
            gameId: $this->input('game.id'),
            seats: $this->input('table.seats')
        );
    }
}
