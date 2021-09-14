<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'apartment_id', 'service', 'location', 'security', 'cleanliness', 'comfort', 'comment', 'status'
    ];
    
}
