<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    /**
     * Get all district for city
     * 
     * @return object
     */
    public function district()
    {
        return $this->belongsTo('App\District');
    }

    /**
     * Get all province for city
     * 
     * @return object
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
