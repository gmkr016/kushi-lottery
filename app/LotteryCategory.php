<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LotteryCategory extends Model
{
    protected $table = 'lottery_categories';

    public function lotteries()
    {
        $this->hasMany('App\Models\Lottery', 'cat_id', 'id');
    }
}
