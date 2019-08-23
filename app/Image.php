<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name'
    ];
    public function category_images()
    {
        return $this->belongsTo('App\category_images');
    }
}
