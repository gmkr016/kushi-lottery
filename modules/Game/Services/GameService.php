<?php

namespace Modules\Game\Services;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class GameService implements InterfaceGameService
{
    public function getBuilderOrPaginator($data): Paginator|Builder
    {
        $query = Game::query()
            ->select($data->columns)
            ->withCount($data->withCount)
            ->when($data->from, fn ($query) => $query->where('drawDate', '>', $data->from))
            ->when($data->to, fn ($query) => $query->where('drawDate', '<', $data->to))
            ->with($data->withRelation)
            ->orderBy($data->orderByColumn, $data->orderDirection);
        if ($data->getBuilder) {
            return $query;
        }

        return $query->simplePaginate($data->pageSize);
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

    public function getCurrentGame(array $with = []): Model|Builder|null
    {
        return Game::getGamesByStartDate(constraint: '<=', startDate: Carbon::now())
            ->first();
    }

    public function create(GameData $data): array
    {
        return Game::query()->create($data->toArray())->toArray();
    }

    public function findById(string $gameId): ?GameData
    {
        if ($game = Game::query()->find($gameId)) {
            return GameData::from($game);
        }

        return null;
    }

    public function distributePrice(Game $game)
    {
        $winningNumber = $game->getRelation('lottery');
    }

    public function pullLotteryNumbersCount(array $gamesArray): array
    {
        return array_column($gamesArray, 'lottery_numbers_count');
    }

    public function calculateGrossSaleByGames(array $gamesArray): int
    {
        return array_sum($this->pullLotteryNumbersCount($gamesArray)) * config('lottery.ticketPrice', 100);
    }

    public function getGrossSaleByGamesWithCurrency(array $gamesArray, string $currency): string
    {
        return Number::currency(
            $this->calculateGrossSaleByGames($gamesArray),
            $currency
        );
    }
}
