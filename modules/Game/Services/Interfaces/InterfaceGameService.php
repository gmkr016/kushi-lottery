<?php

namespace Modules\Game\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Game\DTO\GameData;

interface InterfaceGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10, bool $withLotteryNumberCount = false): Paginator;
    public function findById(string $gameId): GameData;

    public function getSalesCount(?Model $game = null): int;

    public function getCurrentGame(): Model|Builder|null;

    public function getLatestWithSalesCount(): array;

    public function countTotalLotteryNumber(): int;

    public function create(GameData $data): array;
}
