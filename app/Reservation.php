<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'company_id'
    ];
    public function Company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function ReservationImages()
    {
        return $this->hasMany('App\ReservationImage', 'reservation_id');
    }
}
