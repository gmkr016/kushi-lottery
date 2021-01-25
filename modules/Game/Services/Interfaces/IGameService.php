<?php

namespace Modules\Game\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Game\DTO\GameData;

interface IGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10): Paginator;

    public function getLatestWithSalesCount();

    public function create(GameData $data): array;
}
