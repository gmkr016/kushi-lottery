<?php

namespace Modules\Game\DTO;

use Modules\Game\Enums\EnumNumbersType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class LotteryNumberData extends Data
{
    public function __construct(
        public string|null|Optional $id,
        public string $ticketId,
        public EnumNumbersType $type,
        public int $first,
        public int $second,
        public int $third,
        public int $fourth,
        public int $fifth,
        public int $sixth,
        public string|null|Optional $createdAt,
        public string|null|Optional $updatedAt,
        public string|null|Optional $deletedAt,
    ) {
    }
}
