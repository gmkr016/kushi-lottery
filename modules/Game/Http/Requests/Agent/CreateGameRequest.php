<?php

namespace Modules\Game\Http\Requests\Agent;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
            'drawDate' => ['required', 'date'],
        ];
    }
}
