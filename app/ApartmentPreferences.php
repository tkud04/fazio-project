<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentPreferences extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'apartment_id'
	];
}