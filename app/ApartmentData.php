<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentData extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'apartment_id', 'description', 'category', 'property_type', 'rooms', 'units', 'bathrooms', 'bedrooms', 'amount', 'landmarks'
	];
}
