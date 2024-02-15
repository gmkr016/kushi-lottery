<?php

namespace Modules\Game\Http\Requests\Agent;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gameId' => ['required', 'exists:games,id', 'string'],
            'identificationType' => ['in:citizenship,license'],
            'identificationNumber' => ['required', 'string'],
            'lotteryNumbers' => ['array', 'required'],
            'lotteryNumbers.*.numbers' => ['array', 'required', 'size:6'],
            'lotteryNumbers.*.type' => ['in:auto,manual'],
        ];
    }
}
