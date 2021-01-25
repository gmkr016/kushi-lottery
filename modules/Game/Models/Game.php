<?php

namespace Modules\Game\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * show off @method
 *
 * @method static Builder withCounts()
 */
class Game extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $keyType = 'string';

    public $incrementing = false;

    const CREATED_AT = 'createdAt';

    const UPDATED_AT = 'updatedAt';

    const DELETED_AT = 'deletedAt';

    protected $guarded = null;

    public static $snakeAttributes = false;

    protected $casts = [
        'startDate' => 'date',
        'endDate' => 'date',
        'drawDate' => 'date',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::id();

            return true;
        });
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'gameId');
    }

    public function lotteryNumbers(): HasManyThrough
    {
        return $this->hasManyThrough(LotteryNumber::class, Ticket::class, 'gameId', 'ticketId');
    }

    public function scopeWithCounts($query)
    {
        return $query
            ->select('games.id as GameId', 'games.title as gameName', DB::raw('COUNT(DISTINCT t.id) as totalTicketSold'), DB::raw('COUNT(ln.numbers) as totalNumberSold'))
            ->join('tickets as t', 'games.id', '=', 't.gameId')
            ->join('lottery_numbers as ln', 't.id', '=', 'ln.ticketId')
            ->groupBy('games.id', 'games.title');
    }
}
