<?php

namespace Modules\Game\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Game\Models\LotteryNumber;
use Modules\Game\Models\Ticket;

trait HasManyThroughGames
{
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, $this->getForeignKey());
    }

    public function lotteryNumbers(): HasManyThrough
    {
        return $this->hasManyThrough(LotteryNumber::class, Ticket::class, $this->getForeignKey(), 'ticketId', $this->getKeyName());
    }
}
