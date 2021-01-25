<?php

namespace Modules\Game\Services\Interfaces;

use Modules\Game\DTO\LotteryNumberData;
use Spatie\LaravelData\Data;

interface ILotteryNumberService
{
    public function create(LotteryNumberData $numberData): Data;

    public function prepareRowArray(array &$lotteryNumbersWithType): array;

    public function fillKeysToNumberListAndType(array &$lotteryNumberList, string $type): array;
}
