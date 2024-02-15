<?php

namespace Modules\Statistics\Services\Interfaces;

interface InterfaceStatisticService
{
    public function grossSaleByCurrentGame(): array;

    public function grossSale(): array;
}
