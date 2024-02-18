<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Modules\Game\Models\Game;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class StatisticController extends Controller
{
    public function __construct(protected InterfaceStatisticService $statisticService)
    {
    }

    public function listGames(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        try {
            $gameQuery = Game::query()
                ->select(['id', 'title', 'drawDate'])
                ->withCount([
                    'tickets',
                    'lotteryNumbers',
                ])
                ->when($from, fn($query) => $query->where('drawDate', '>', $from))
                ->when($to, fn($query) => $query->where('drawDate', '<', $to))
                ->orderBy('drawDate', 'desc');
            $totalLotteryNumbersCount = array_column($gameQuery->get()->toArray(), 'lottery_numbers_count');

            $data['label'] = 'Games';
            $data['grossSale'] = Number::currency(array_sum($totalLotteryNumbersCount) * config('lottery.ticketPrice'), 'NPR');
            $data['games'] = $gameQuery->simplePaginate()->appends(['from' => $from, 'to' => $to]);
            $data['from'] = $from;
            $data['to'] = $to;
            return view('admin.statistics.index', $data);
        } catch (\Exception $exception) {
            return ['errors' => $exception->getMessage()];
        }
    }
}
