<?php

namespace Modules\Game\DTO;

use Modules\Game\Enums\EnumIdentificationType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TicketData extends Data
{
    public function __construct(
        public string|null|Optional $id,
        public string|null|Optional $user_id,
        public string $gameId,
        public EnumIdentificationType $identificationType,
        public string $identificationNumber,
        public string|null|Optional $createdAt,
        public string|null|Optional $updatedAt,
        public string|null|Optional $deletedAt,
    ) {
    }
}
