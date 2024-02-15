<?php

namespace Modules\Game\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Modules\Game\Enums\EnumIdentificationType;

class Ticket extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    const string CREATED_AT = 'createdAt';

    const string UPDATED_AT = 'updatedAt';

    const string DELETED_AT = 'deletedAt';

    public static $snakeAttributes = false;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = null;

    protected $casts = [
        'identificationType' => EnumIdentificationType::class,
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Ticket $model) {
            if (! $model->user_id) {
                $model->user_id = Auth::id();
            }

            return true;
        });
    }

    public function lotteryNumbers(): HasMany
    {
        return $this->hasMany(LotteryNumber::class, 'ticketId');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'gameId', 'id');
    }
}
