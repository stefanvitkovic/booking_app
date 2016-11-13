<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

use DB;

class BookingController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function store(Request $request){
    	$new_reservation = new Reservation($request->all());
    	$new_reservation->status = '0';
    	$new_reservation->save();

    	$last = Reservation::orderBy('created_at', 'desc')->first();

    	$checkOut = $request->check_out;
        $check_out = date('Y-m-d',strtotime($checkOut . "-1 days"));

        DB::statement("call filldates('$last->id','$request->check_in','$check_out')");
    	
    	return view('test');
    }
}
