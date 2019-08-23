<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationImage extends Model
{
    protected $fillable = [
        'image_id', 'reservation_id'
    ];
    public function Image()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
}
