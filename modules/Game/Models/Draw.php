<?php

namespace Modules\Game\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Draw extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = null;

    const string CREATED_AT = 'createdAt';

    const string UPDATED_AT = 'updatedAt';

    const string DELETED_AT = 'deletedAt';

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'gameId');
    }
}
