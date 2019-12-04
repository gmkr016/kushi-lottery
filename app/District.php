<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent model for District 
 * 
 * @category Class
 * @package  Lottery
 * @author   Susant Paudel <gracysusant@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License 
 * @link     www.khushilottery.com
 */
class District extends Model
{
    /**
     * Get province for District
     * 
     * @return object
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
