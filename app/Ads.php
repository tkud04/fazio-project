<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img', 'type', 'status'
    ];
    
}
