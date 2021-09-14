<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'apartment_id', 'checkin', 'checkout', 'guests', 'kids', 'status'
    ];
    
}
