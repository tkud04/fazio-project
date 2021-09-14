<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'user_id', 'ticket_id', 'subject', 'type', 'resource_id', 'status'
    ];
    
}
