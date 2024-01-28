<?php

namespace Modules\Game\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;

interface InterfaceGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10, bool $withLotteryNumberCount = false): Paginator;

    public function getSalesCount(Game|Model $game): int;

    public function getCurrentGame();
    public function getLatestWithSalesCount(): array;

    public function countTotalLotteryNumber(): int;

    public function create(GameData $data): array;
}
