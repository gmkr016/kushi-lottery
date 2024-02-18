<?php

namespace Modules\Game\Services\Interfaces;

use Modules\Game\DTO\LotteryNumberData;
use Spatie\LaravelData\Data;

interface InterfaceLotteryNumberService
{
    public function create(LotteryNumberData $numberData): Data;

    public function prepareRowArray(array &$lotteryNumbersWithType): array;

    public function fillKeysToNumberListAndType(array &$lotteryNumberList, string $type): array;

    public function totalCount(): int;
}
