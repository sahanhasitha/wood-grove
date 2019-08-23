<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyHasTag extends Model
{
    protected $fillable = [
        'company_id', 'tags'
    ];
}
