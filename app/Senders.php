<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senders extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','ss', 'sp', 'sec', 'sa', 'su', 'current', 'spp', 'sn', 'se', 'status'
    ];
    
}