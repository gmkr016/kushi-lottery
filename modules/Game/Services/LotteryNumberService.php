<?php

namespace Modules\Game\Services;

use Illuminate\Support\Arr;
use Modules\Game\DTO\LotteryNumberData;
use Modules\Game\Models\LotteryNumber;
use Modules\Game\Services\Interfaces\InterfaceLotteryNumberService;
use Spatie\LaravelData\Data;

class LotteryNumberService implements InterfaceLotteryNumberService
{
    public function create(LotteryNumberData $numberData): Data
    {
        $row = LotteryNumber::query()->create($numberData->toArray());

        return LotteryNumberData::from($row);
    }

    /**
     * @param  array{array, string}  $lotteryNumbersWithType  An array containing criteria for selecting numbers.
     *                                                        - 'numbers' (array): An array of numbers.
     *                                                        - 'type' (string): Type of numbers chose.
     */
    public function prepareRowArray(array &$lotteryNumbersWithType): array
    {
        return Arr::map(
            $lotteryNumbersWithType,
            fn ($value) => $this->fillKeysToNumberListAndType($value['numbers'], $value['type']));
    }

    public function fillKeysToNumberListAndType(array &$lotteryNumberList, string $type): array
    {
        $keys = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'type'];
        $lotteryNumberList[] = $type;

        return array_combine($keys, $lotteryNumberList);
    }

    public function totalCount(): int
    {
        return LotteryNumber::query()->count();
    }
}
