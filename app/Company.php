<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'phone', 'website', 'address', 'type_id'
    ];
    public function CompanyHasTags()
    {
        return $this->hasMany('App\CompanyHasTag', 'company_id');
    }
}
