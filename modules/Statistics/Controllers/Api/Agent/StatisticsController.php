<?php

namespace Modules\Statistics\Controllers\Api\Agent;

use App\Http\Controllers\Controller;
use Modules\Game\Services\Interfaces\IGameService;

class StatisticsController extends Controller
{
    public function __construct(protected IGameService $gameService)
    {
    }

    public function getCurrentGameStatistics()
    {
        $game = $this->gameService->getLatestWithSalesCount();

        return response()->success(['data' => $game]);
    }
}
