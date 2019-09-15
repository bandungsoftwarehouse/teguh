<?php

namespace App\Http\Middleware;

use Closure;

class ManagementUser
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
        $management = auth()->user()->groups()->where('groupname',['admin','sales','sales'])->first();
        if($management){
            return $next($request);
        }
        return response()->view('errors.404');
    }
}
