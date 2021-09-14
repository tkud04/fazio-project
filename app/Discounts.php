<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'discount_type', 'discount', 'type', 'status'
    ];
    
}
