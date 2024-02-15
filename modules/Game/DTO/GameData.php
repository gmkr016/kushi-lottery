<?php

namespace Modules\Game\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GameData extends Data
{
    public function __construct(
        public string|null|Optional $id,
        public string|null|Optional $user_id,
        public string $title,
        public string $startDate,
        public string $endDate,
        public string $drawDate,
        public string|null|Optional $createdAt,
        public string|null|Optional $updatedAt,
        public string|null|Optional $deletedAt,
    ) {
    }
}
