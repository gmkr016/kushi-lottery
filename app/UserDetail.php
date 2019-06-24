<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //

    public function user() {
        $this->hasOne('App\User');
    }
}
