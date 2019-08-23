<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'company_id'
    ];
    public function Company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function ProductImages()
    {
        return $this->hasMany('App\ProductImage', 'product_id');
    }
}
