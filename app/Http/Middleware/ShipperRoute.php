<?php

namespace App\Http\Middleware;

use Closure;

class ShipperRoute
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
        if(!\Auth::check()){
            return redirect('/login');            
        }
        $type = auth()->user()->user_type;
        if($type == 'Nhân viên vận chuyển')
            return $next($request);
        else
            return redirect('/home');
    }
}
