<?php

namespace App\Http\Middleware;

use Closure;

use DB;

class Check
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
        $now = date('Y-m-d');

        $check = DB::select("SELECT dates FROM days WHERE dates BETWEEN :check_in AND :check_out AND apartment_id = :ap_id",['check_in' => "$request->check_in",'check_out' => "$request->check_out",'ap_id' => "$request->apartment_id"]);
        if($check){
            $response = 'room has ocupated';
            return response($response);
        }
        if($request->check_in === $request->check_out || $request->check_in > $request->check_out || $request->check_in < $now){
            $response = 'Date is invalid';
            return response($response);
        }

        return $next($request);
    }
}
