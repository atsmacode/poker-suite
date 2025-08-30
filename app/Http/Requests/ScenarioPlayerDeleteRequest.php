<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScenarioPlayerDeleteRequest extends FormRequest
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
            'scenario_id' => ['required|integer'], // We will use this to validate that the table_seat+player is really in the scenario
            'player_id' => ['required|integer'],
        ];
    }
}
