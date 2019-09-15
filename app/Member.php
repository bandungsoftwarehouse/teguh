<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $fillable = [
	    'user_id',
	    'group_id'
	    'plan',
	    'status',
	    'expired_at',
    ];
}
