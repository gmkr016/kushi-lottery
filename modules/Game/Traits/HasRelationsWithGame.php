<?php

namespace Modules\Game\Traits;

use App\Models\Game\Game;
use App\Models\Game\LotteryNumber;
use App\Models\Game\Ticket;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

trait HasRelationsWithGame
{
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, $this->getForeignKey());
    }

    public function lotteryNumbers(): HasManyThrough
    {
        return $this->hasManyThrough(LotteryNumber::class, Ticket::class, $this->getForeignKey(), 'ticketId', $this->getKeyName());
    }
}
