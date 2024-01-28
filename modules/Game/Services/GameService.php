<?php

namespace Modules\Game\Services;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class GameService implements InterfaceGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10, bool $withLotteryNumberCount = false): Paginator
    {
        return Game::query()
            ->select($columns)
            ->when($withLotteryNumberCount, fn ($query) => $query->withCount('lotteryNumbers'))
            ->paginate($pageSize);
    }

    public function getLatestWithSalesCount(): array
    {
        return Game::withCounts()
            ->get()->toArray();
    }

    public function getSalesCount(Game|Model $game): int
    {
        return $game->tickets()->count();
    }

    public function getCurrentGame(): Model|Builder|null
    {
        return Game::query()
            ->whereDate('startDate', '<=', Carbon::now())
            ->whereDate('endDate', '>=', Carbon::now())
            ->orderBy('createdAt', 'desc')
            ->first();
    }

    public function create(GameData $data): array
    {
        return Game::query()->create($data->toArray())->toArray();
    }

    public function countTotalLotteryNumber(): int
    {
        return 1;
    }
}
