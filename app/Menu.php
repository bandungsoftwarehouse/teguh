<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'text','description','url','level','parent','permission','icon',
    ];

    protected $hidden = [];

    public function groups()
    {
        return $this->belongsToMany('App\Group','group_menu','menu_id','group_id');
    }

    public function product()
    {
        return $this->hasOne('App\Product','detail_id','id');
    }
}
