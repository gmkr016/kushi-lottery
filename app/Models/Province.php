<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //

    /**
     * Get the Districts for the province.
     *
     * @return object
     */
    public function distritcs()
    {

        return $this->hasMany('App\Models\District');
    }

    /**
     * Get the cities for the province.
     *
     * @return object
     */
    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
