<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	public function users()
	{
	    return $this->belongsToMany('App\User');
	}

	public function menus()
	{
		return $this->belongsToMany('App\Menu','group_menu','group_id','menu_id');
	}
}
