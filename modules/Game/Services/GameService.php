<?php

namespace Modules\Game\Services;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;
use Ramsey\Uuid\Uuid;

class GameService implements InterfaceGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10, bool $withLotteryNumberCount = false): Paginator
    {
        return Game::query()
            ->select($columns)
            ->when($withLotteryNumberCount, fn ($query) => $query->withCount('lotteryNumbers'))
            ->orderBy('drawDate', 'desc')
            ->with(['lottery'])
            ->paginate($pageSize);
    }

    public function getLatestWithSalesCount(): array
    {
        return Game::withCounts()
            ->get()->toArray();
    }

    public function getSalesCount(?Model $game = null): int
    {
        if ($game) {
            return $game->tickets()->count();
        }

        return Game::query()->tickets()->count();
    }

    public function getCurrentGame(): Model|Builder|null
    {
        return Game::getGamesByStartDate(constraint: '<=', startDate: Carbon::now())
            ->first();
    }

    public function create(GameData $data): array
    {
        return Game::query()->create($data->toArray())->toArray();
    }

    public function countTotalLotteryNumber(): int
    {
        $grossSale = 0;
        $currentGame = $this->getCurrentGame();
        if ($currentGame) {
            $ticketSale = $currentGame->tickets()->count();
            $grossSale = config('lottery.ticketSale') * 100;
        }

        return $grossSale;
    }

    public function findById(string $gameId): ?GameData
    {
        if($game = Game::query()->find($gameId)){
            return GameData::from($game);
        }
        return null;
    }
}
