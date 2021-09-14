<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAccounts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'bank_id', 'business_name', 'subaccount_code', 'split_code', 'status'
    ];
}
