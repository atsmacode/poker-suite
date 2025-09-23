<?php

namespace App\Http\Requests;

use App\Enums\Card;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HoleCardStoreRequest extends FormRequest
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
            'player_id' => ['required', 'integer'],
            'card_id' => ['required', 'integer', Rule::in(Card::toIds())],
            'hand_id' => ['required', 'integer'],
            'face_up' => ['required', 'boolean'],
        ];
    }
}
