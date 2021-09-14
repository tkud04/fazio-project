<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'amount', 'pc', 'frequency', 'ps_id', 'added_by', 'status'
    ];
}
