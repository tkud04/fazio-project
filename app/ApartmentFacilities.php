<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentFacilities extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'apartment_id', 'facility', 'selected'
    ];
}
