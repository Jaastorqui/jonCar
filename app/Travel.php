<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Travel extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'cityDeparture', 'cityArrived'
    ];

    public function passengers () { 
        return $this->hasMany('App\Passenger');
    }
}
