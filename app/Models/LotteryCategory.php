<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryCategory extends Model
{
    protected $table = 'lottery_categories';

    public function lotteries()
    {
        return $this->hasMany(Lottery::class, 'cat_id', 'id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'cat_id');
    }
}
