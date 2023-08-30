<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'development_studio' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
}
