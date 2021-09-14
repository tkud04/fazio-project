<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferenceData extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'preference_id', 'category', 'property_type', 'rooms', 'units', 'amount', 'bathrooms', 'bedrooms'
    ];
}
