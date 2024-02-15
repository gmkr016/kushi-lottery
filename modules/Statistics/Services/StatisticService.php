<?php

namespace Modules\Statistics\Services;

use Modules\Game\Services\Interfaces\InterfaceGameService;
use Modules\Game\Services\Interfaces\InterfaceTicketService;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class StatisticService implements InterfaceStatisticService
{
    public function __construct(protected InterfaceGameService $gameService, protected InterfaceTicketService $ticketService)
    {
    }

    public function grossSaleByCurrentGame(): array
    {
        $grossSale = 0;
        $currentGame = $this->gameService->getCurrentGame();
        if ($currentGame) {
            $ticketSale = $currentGame->tickets()->count();
            $grossSale = config('lottery.ticketPrice') * $ticketSale;
        }
        return ['grossCurrentSale' => $grossSale];
    }

    public function grossSale(): array
    {
        $grossCount = $this->ticketService->totalCount();
        $grossSale = config('lottery.ticketPrice') * $grossCount;
        return ['grossSale' => $grossSale];
    }
}
