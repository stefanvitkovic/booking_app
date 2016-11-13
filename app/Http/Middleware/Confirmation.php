<?php

namespace App\Http\Middleware;

use Closure;
use App\Reservation;

class Confirmation
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
        if($request->cookie('reservation_id')){
            return $next($request);
        }else{
            return redirect('/');
        }        
    }
}
