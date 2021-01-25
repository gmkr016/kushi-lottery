<?php

namespace App\Models;

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
        return $this->belongsTo('App\Models\District');
    }

    /**
     * Get all province for city
     *
     * @return object
     */
    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }
}
