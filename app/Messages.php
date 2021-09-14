<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'apartment_id', 'host', 'msg', 'sent_by', 'status'
    ];
}
