<?php

namespace Modules\Statistics\Controllers\Api\Agent;

use App\Http\Controllers\Controller;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatisticsController extends Controller
{
    public function __construct(protected InterfaceStatisticService $statisticService)
    {
    }

    public function getCurrentGameSales(): JsonResponse
    {
        return response()->success(['data' => null]);
    }
}
