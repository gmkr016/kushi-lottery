<?php

namespace Modules\Game\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Game\DTO\GameData;
use Modules\Game\DTO\GetGameParamData;

interface InterfaceGameService
{
    public function getBuilderOrPaginator(
        GetGameParamData $paramData
    ): Paginator|Builder;

    public function findById(string $gameId);

    public function getSalesCount(?Model $game = null): int;

    public function getCurrentGame(array $with = []): Model|Builder|null;

    public function getLatestWithSalesCount(): array;

    public function create(GameData $data): array;

    public function pullLotteryNumbersCount(array $gamesArray): array;

    public function calculateGrossSaleByGames(array $gamesArray): int;

    public function getGrossSaleByGamesWithCurrency(array $gamesArray, string $currency): string;
}
