<?php

namespace App\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class LotteryData extends Data
{
    public function __construct(
        public int $serial,
        public int $cat_id,
        public int $u_id,
        public int $first_number,
        public int $second_number,
        public int $third_number,
        public int $fourth_number,
        public int $fifth_number,
        public int $sixth_number,
        public Optional $created_at,
        public Optional $updated_at,
    ) {
    }
}
