<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'tag_id'
    ];
}