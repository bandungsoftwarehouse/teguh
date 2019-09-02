<?php

namespace App\Http\Middleware;

use Closure;

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
        \Menu::make('MyNavBar', function ($menu) {
            $home = $menu->add('home',['class'=>'sub-menu']);
            $home->attr(['href'=>'javascript:;'])
                ->prepend('<i class="fa fa-desktop"></i>');
            $models = $menu->add('Models', ['class'=>'sub-menu'])
                ->attr(['href'=>'javascript:;'])
                ->prepend('<i class="fa fa-mobile"></i>');
            $models->add('IPhone','iphone');
            $models->add('Samsung','samsung');
            $models->add('Oppo','Oppo');
            $models->add('Vivo','Vivo');
            $models->add('Huawei','huawei');
            $menu->add('About', ['class'=>'sub-menu'])
                ->attr(['href'=>'javascript:;'])
                ->prepend('<i class="fa fa-book"></i>');
            $menu->add('Services', ['class'=>'sub-menu']);
            $menu->add('Contact', ['class'=>'sub-menu']);
        });

        return $next($request);
    }
}
