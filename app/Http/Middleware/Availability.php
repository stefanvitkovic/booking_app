<?php

namespace App\Http\Middleware;

use Closure;

use DB; 

class Availability
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
        if(isset($request->check_in,$request->check_out,$request->apartment_id)){

            $check = DB::select("SELECT dates FROM days WHERE dates BETWEEN :check_in AND :check_out AND apartment_id = :ap_id",['check_in' => "$request->check_in",'check_out' => "$request->check_out",'ap_id' => "$request->apartment_id"]);
            
            $now = date('Y-m-d');
         
            if($check || $request->check_in < $now || $request->check_in > $request->check_out || empty($request->check_in) || empty($request->check_out) || empty($request->apartment_id)){
                return redirect('/');         
        }
            return $next($request);
        }else{
            return redirect('/'); 
        }
    }
}
