<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'detail_id'
    ];
    public function owner()
    {
        return $this->belongsToMany('App\User','member','product_id')
                    ->withPivot(['plan','status','expired_at']);
    }

    public function detail()
    {
        return $this->hasOne('App\Menu','id','detail_id');
    }
}
