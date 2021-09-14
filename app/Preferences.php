<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'avb', 'rating'
    ];
}
