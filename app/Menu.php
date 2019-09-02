<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'text','description','url','level','parent','permission'
    ];

    protected $hidden = [];
}
