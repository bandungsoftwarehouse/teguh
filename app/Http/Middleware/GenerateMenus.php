<?php

namespace App\Http\Middleware;

use Closure;
use \App\Menu as Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
          return $next($request);
        }
	$menus = Menu::all();
        $group = 'user';
        \Menu::make('MyNavBar', function ($menu) use ($menus,$group) {
            $branch = [];
            $home = $menu->add('Home',['class'=>'sub-menu'])->before(view('layouts.profile'))
                         ->prepend('<i class="fa fa-home"></i>');
                         $home->link->href('/home');
	    $branch[0] = $home;
	    foreach ($menus as $m) {
		/**
		 * LOGIC: 
		 * jika dari semua group yang dimiliki oleh menu ini tidak ada satupun yang 
		 * menjadi salah satu group dari current user, maka skip 
		 */
		if(
			$m->groups()->whereHas('users',function($r){
				$r->where('users.id',auth()->user()->id);
			})->count() == 0
		) {
			   continue;
		} 
		if($m->parent==NULL) {
		    $branch[$m->id] = $menu->add($m->text,['class'=>'sub-menu'])
                                      ->prepend('<i class="fa fa-'.$m->icon.'"></i>');
		    $branch[$m->id]->link->href($m->url);
		} else {
		    if(!array_key_exists($m->parent,$branch)) continue;
		    $detail = $m->product()->has('detail')->first();
		    $branch[$m->id] = $branch[$m->parent]->add($m->text,['class'=>'sub-menu'])
                                      ->prepend('<i class="fa fa-'.$m->icon.'"></i>');
		    if($detail){
		      $branch[$m->id]->link->href('/model/'.$detail->id);
                    } else {
		      $branch[$m->id]->link->href('/promo/'.$m->id);
		    }
		}
	    }
	});
        return $next($request);
    }
}
