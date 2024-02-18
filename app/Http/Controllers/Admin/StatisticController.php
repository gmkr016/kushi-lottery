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
        $from = $request->get('from');
        $to = $request->get('to');
        $params = new GetGameParamData(
            columns: ['id', 'title', 'drawDate'],
            withCount: ['tickets', 'lotteryNumbers'],
            from: $request->get('from'),
            to: $request->get('to'),
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
            $data['games'] = $gameBuilder->simplePaginate()->appends(['from' => $from, 'to' => $to]);
            $data['from'] = $from;
            $data['to'] = $to;

            return view('admin.statistics.index', $data);
        } catch (\Exception $exception) {
            return ['errors' => $exception->getMessage()];
        }
    }
}
