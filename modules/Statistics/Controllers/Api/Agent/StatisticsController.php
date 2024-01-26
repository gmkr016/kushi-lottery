<?php

namespace Modules\Statistics\Controllers\Api\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatisticsController extends Controller
{
    public function __construct(protected InterfaceStatisticService $statisticService)
    {
    }

    public function getCurrentGameStatistics(): JsonResponse
    {
        $game = $this->statisticService->getGamesStatistics();

        return response()->success(['data' => $game]);
    }
}
