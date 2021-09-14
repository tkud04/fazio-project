<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartments extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'apartment_id', 'avb', 'bank_id', 'name', 'url', 'status', 'in_catalog'
    ];
}
