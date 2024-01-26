<?php

namespace Modules\Statistics\Services;

use Modules\Game\Services\Interfaces\InterfaceGameService;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class StatisticService implements InterfaceStatisticService
{
    public function __construct(protected InterfaceGameService $gameService)
    {
    }

    public function getGamesStatistics(): array
    {
        return $this->gameService->getLatestWithSalesCount();
    }
}
