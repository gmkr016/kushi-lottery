<?php

namespace Modules\Game\DTO;

use Spatie\LaravelData\Data;

class GetGameParamData extends Data
{
    public function __construct(
        public array $columns = ['*'],
        public int $pageSize = 10,
        public array $withCount = [],
        public array $withRelation = [],
        public ?string $from = null,
        public ?string $to = null,
        public string $orderByColumn = 'drawDate',
        public string $orderDirection = 'desc',
        public bool $getBuilder = false
    ) {
    }
}
