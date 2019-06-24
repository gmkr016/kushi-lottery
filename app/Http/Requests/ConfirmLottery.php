<?php

namespace App\Http\Requests;

use App\Models\Lottery;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class ConfirmLottery extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $input = [
            $this->first,
            $this->second,
            $this->third,
            $this->fourth,
            $this->fifth,
            $this->sixth,
        ];

        return $this->_validateRepetitive($input) && $this->_validateExist($input);
        // return $this->_validateRepetitive($first, $second, $third);
    }

    public function _validateExist($input)
    {
        $result = Lottery::validateNumbers($input)->first();

        if (!empty($result)) {
            throw new Exception(trans('lottery.error.exists', [
                'date' => $result->created_at->format('M d Y h:i:s A'),
            ]));
        }
        return true;
    }

    public function _validateRepetitive($input)
    {
        $length = count($input) - 1;

        // dynamically compare the number of input
        // if in case the setup is 4 numbers this program is ready
        for ($x = 0; $x <= $length; $x++) {
            for ($y = $x + 1; $y <= $length; $y++) {
                if ($input[$x] == $input[$y]) {
                    throw new Exception('There is a repetitive number');
                }
            }
        }
        // if there is no repetitive number allow
        return true;
        // it is the same setup as this
        // 1 = 1-2, 1-3, 1-4, 1-5, 1-6
        // 2 = 2-3, 2-4, 2-5, 2-6,
        // 3 = 3-4, 3-5, 3-6
        // 4 = 4-5, 4-6
        // 5 = 5-6,
        // 6 =
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $config = config('lottery.numbers');
        $condition = "required|numeric|min:{$config['min']}|max:{$config['max']}";

        return [
            'first' => $condition,
            'second' => $condition,
            'third' => $condition,
            'fourth' => $condition,
            'fifth' => $condition,
            'sixth' => $condition,
        ];
    }

    public function messages()
    {
        $validation = trans('lottery.validation.required');
        return [
            'first.required' => $validation,
            'second.required' => $validation,
            'third.required' => $validation,
            'fourth.required' => $validation,
            'fifth.required' => $validation,
            'sixth.required' => $validation,

        ];
    }
}
