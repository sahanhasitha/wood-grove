<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'decription', 'price', 'company_id'
    ];
    public function Company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function ServiceImages()
    {
        return $this->hasMany('App\ServiceImage', 'service_id');
    }
}
