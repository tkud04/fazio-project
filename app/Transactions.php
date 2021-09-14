<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'item_id', 'apartment_id', 'user_id'
    ];
    
}
