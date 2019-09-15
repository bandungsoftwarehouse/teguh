<?php

namespace App\Http\Middleware;

use Closure;

class PaidMember
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
        \Log::info('check status payment user: '. auth()->user()->name);
	$products = auth()->user()->products()->where(function($m){
            $m->where('member.status','A');
	})->get();
        if($products->count() > 0){
	   $request->attributes->add(['products' => $products]);
           return $next($request);
        }
        return response()->view('errors.404');
    }
}
