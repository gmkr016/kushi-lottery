<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Game\DTO\GetGameParamData;
use Modules\Game\Services\Interfaces\InterfaceGameService;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class StatisticController extends Controller
{
    public function __construct(
        protected InterfaceStatisticService $statisticService,
        protected InterfaceGameService $gameService)
    {
    }

    public function listGames(Request $request)
    {
        $data['from'] = $request->get('from');
        $data['to'] = $request->get('to');
        $data['orderByColumn'] = $request->get('orderByColumn');
        $data['orderByDirection'] = $request->get('orderByDirection');
        $params = new GetGameParamData(
            columns: ['id', 'title', 'drawDate'],
            withCount: ['tickets', 'lotteryNumbers'],
            from: $data['from'],
            to: $data['to'],
            orderByColumn: $data['orderByColumn'],
            orderDirection: $data['orderByDirection'],
            getBuilder: true
        );
        try {
            $gameBuilder = $this->gameService->getBuilderOrPaginator($params);
            $data['label'] = 'Games';
            $data['grossSale'] = $this
                ->gameService
                ->getGrossSaleByGamesWithCurrency(
                    gamesArray: $gameBuilder->get()->toArray(),
                    currency: 'NPR'
                );
            $data['games'] = $gameBuilder->simplePaginate()->appends(['from' => $params->from, 'to' => $params->to]);

            return view('admin.statistics.index', $data);
        } catch (\Exception $exception) {
            return ['errors' => $exception->getMessage()];
        }
    }
}
