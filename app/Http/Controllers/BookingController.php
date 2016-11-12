<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

class BookingController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function store(Request $request){
    	$new_reservation = new Reservation($request->all());
    	$new_reservation->status = '0';
    	$new_reservation->save();
    	return view('test',['x'=>$request->input()]);
    }
}
