<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketItems extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'ticket_id', 'msg', 'added_by'
    ];
    
}
