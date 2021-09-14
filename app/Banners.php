<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'type', 'cover', 'copy', 'status', 'added_by', 'deleted', 'delete_token'
    ];
    
}
