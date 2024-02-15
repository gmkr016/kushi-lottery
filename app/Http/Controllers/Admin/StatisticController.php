<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game\LotteryNumber;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Modules\Game\Models\Game;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class StatisticController extends Controller
{
    public function __construct(protected InterfaceStatisticService $statisticService)
    {
    }

    public function listTickets(Request $request)
    {
        $gameId = $request->get('gameId');
        $data['tickets'] = $this->statisticService->listTicketsWithLotteryNumberCount(['id', 'gameId', 'user_id', 'createdAt'])->appends($request->except('page'));
        $data['totalSales'] = LotteryNumber::query()->count() * config('lottery.ticketPrice');
        try {
            return Game::query()
                ->when($gameId, fn(Builder $query) => $query->where('id', $gameId))
                ->withCount(['tickets', 'lotteryNumbers'])
                ->simplePaginate();
            return view('admin.statistics.index', $data);
        } catch (\Exception $exception) {
            return ['errors' => $exception->getMessage()];
        }
    }
}
