<?php

namespace Modules\Game\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Game\DTO\GameData;

interface InterfaceGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10): Paginator;

    public function getLatestWithSalesCount(): array;

    public function create(GameData $data): array;
}
