<?php

namespace App\Models;

use App\Models\Game\Game;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Game\Traits\HasManyThroughGames;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasManyThroughGames, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pan',
        'cname',
        'location',
        'contact',
        'wallet',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userdetail()
    {
        $this->hasOne('App\Models\UserDetail');
    }

    public function lottery()
    {
        $this->hasMany('App\Models\Lottery', 'u_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
