<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnonOrders extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'reference', 'name', 'phone', 'address', 'city', 'state'
    ];
    
}
