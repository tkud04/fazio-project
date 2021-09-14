<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentTerms extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'apartment_id', 'max_adults', 'max_children', 'children', 'pets', 'payment_type'
	];
}
