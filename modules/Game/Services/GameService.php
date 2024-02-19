<?php

namespace Modules\Game\Services;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use Modules\Game\DTO\GameData;
use Modules\Game\DTO\GetGameParamData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class GameService implements InterfaceGameService
{
    const string CONSTRAINT_LTE = '<=';
    const string CONSTRAINT_GT = '>';
    const string CONSTRAINT_LT = '<';
    const string COLUMN_DRAW_DATE = 'drawDate';
    const string RELATION_LOTTERY = 'lottery';
    const string RELATION_LOTTERY_NUMBERS = 'lottery_numbers';

    const string CONFIG_TICKET_PRICE_KEY = 'lottery.ticketPrice';
    public function __construct(protected Builder $query)
    {
        $this->query = Game::query();
    }

    public function getBuilderOrPaginator(GetGameParamData $paramData): Paginator|Builder
    {
        $query = $this->query
            ->select($paramData->columns)
            ->withCount($paramData->withCount)
            ->when($paramData->from, fn($query) => $query->where(self::COLUMN_DRAW_DATE, self::CONSTRAINT_GT, $paramData->from))
            ->when($paramData->to, fn($query) => $query->where(self::COLUMN_DRAW_DATE, self::CONSTRAINT_LT, $paramData->to))
            ->with($paramData->withRelation)
            ->when($paramData->orderByColumn,
                fn($query) => $query->orderBy($paramData->orderByColumn, $paramData->orderDirection),
                fn($query) => $query->orderBy('id', $paramData->orderDirection)
            );
        if ($paramData->getBuilder) {
            return $query;
        }

        return $query->simplePaginate($paramData->pageSize);
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
        return Game::getGamesByStartDate(constraint: self::CONSTRAINT_LTE, startDate: Carbon::now())
            ->first();
    }

    public function create(GameData $data): array
    {
        return $this->query->create($data->toArray())->toArray();
    }

    public function findById(string $gameId): ?GameData
    {
        if ($game = $this->query->find($gameId)) {
            return GameData::from($game);
        }

        return null;
    }

    public function distributePrice(Game $game)
    {
        $winningNumber = $game->getRelation(self::RELATION_LOTTERY);
    }

    public function pullLotteryNumbersCount(array $gamesArray): array
    {
        return array_column($gamesArray, self::RELATION_LOTTERY_NUMBERS . "_count");
    }

    public function calculateGrossSaleByGames(array $gamesArray): int
    {
        return array_sum($this->pullLotteryNumbersCount($gamesArray)) * config(self::CONFIG_TICKET_PRICE_KEY, 100);
    }

    public function getGrossSaleByGamesWithCurrency(array $gamesArray, string $currency): string
    {
        return Number::currency(
            $this->calculateGrossSaleByGames($gamesArray),
            $currency
        );
    }
}
