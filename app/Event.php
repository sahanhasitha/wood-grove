<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'price', 'company_id'
    ];
    public function Company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function EventImages()
    {
        return $this->hasMany('App\EventImage', 'event_id');
    }
}
