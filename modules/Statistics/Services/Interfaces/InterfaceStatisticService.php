<?php

namespace Modules\Statistics\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface InterfaceStatisticService
{
    public function grossSaleByCurrentGame(): array;

    public function grossSale(): array;

    public function listTicketsWithLotteryNumberCount(array $columns = ['*']): Paginator;
}
