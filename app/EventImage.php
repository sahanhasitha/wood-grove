<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $fillable = [
        'image_id', 'event_id'
    ];
    public function Image()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
}
