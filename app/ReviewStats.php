<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewStats extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'review_id', 'user_id', 'upvotes', 'downvotes'
    ];
}
