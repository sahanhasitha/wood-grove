<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    protected $fillable = [
        'image_id', 'service_id'
    ];
    public function Image()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
}
