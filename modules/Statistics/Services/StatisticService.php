<?php

namespace Modules\Statistics\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Game\Services\Interfaces\InterfaceGameService;
use Modules\Game\Services\Interfaces\InterfaceLotteryNumberService;
use Modules\Game\Services\Interfaces\InterfaceTicketService;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class StatisticService implements InterfaceStatisticService
{
    public function __construct(
        protected InterfaceGameService $gameService,
        protected InterfaceTicketService $ticketService,
        protected InterfaceLotteryNumberService $lotteryNumberService
    ) {
    }

    public function grossSaleByCurrentGame(): array
    {
        $grossSale = 0;
        $currentGame = $this->gameService->getCurrentGame();
        if ($currentGame) {
            $ticketSale = $currentGame->tickets()->count();
            $grossSale = config('lottery.ticketPrice', 100) * $ticketSale;
        }

        return ['grossCurrentSale' => $grossSale];
    }

    public function grossSale(): array
    {
        $grossCount = $this->lotteryNumberService->totalCount();
        $grossSale = config('lottery.ticketPrice', 100) * $grossCount;

        return ['grossSale' => $grossSale];
    }

    public function listTicketsWithLotteryNumberCount(array $columns = ['*']): Paginator
    {
        return $this->ticketService->listTicketsWithLotteryNumberCountByGame($columns);
    }
}
