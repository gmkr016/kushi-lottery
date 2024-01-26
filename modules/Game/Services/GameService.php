<?php

namespace Modules\Game\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class GameService implements InterfaceGameService
{
    public function get(array $columns = ['*'], int $pageSize = 10): Paginator
    {
        return Game::query()
            ->select($columns)
            ->paginate($pageSize);
    }

    public function getLatestWithSalesCount(): array
    {
        return Game::withCounts()
            ->get()->toArray();
    }

    public function create(GameData $data): array
    {
        return Game::query()->create($data->toArray())->toArray();
    }
}