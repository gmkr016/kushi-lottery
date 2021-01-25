<?php

namespace Modules\Game\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\IGameService;

class GameService implements IGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10): Paginator
    {
        return Game::query()
            ->select($columns)
            ->paginate($pageSize);
    }

    public function getLatestWithSalesCount()
    {
        return Game::withCounts()
            ->get();
    }

    public function create(GameData $data): array
    {
        return Game::query()->create($data->toArray())->toArray();
    }
}
