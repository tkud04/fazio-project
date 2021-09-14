<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'tag', 'name'
	];
}
