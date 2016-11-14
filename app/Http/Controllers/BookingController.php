<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

use App\Apartment;

use DB;

use App\Mail\ConfirmationMail;

use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index(){
        $apartments = Apartment::all();
    	return response()->view('index',['apartments'=>$apartments]);
    }

    public function store(Request $request){
    	$new_reservation = new Reservation($request->all());
    	$new_reservation->status = '0';
    	$new_reservation->save();

    	$last = Reservation::orderBy('created_at', 'desc')->first();

    	$checkOut = $request->check_out;
        $check_out = date('Y-m-d',strtotime($checkOut . "-1 days"));
    	
        $reservation = Reservation::findOrFail($last->id);
        Mail::to('test@gmail.com')->send(new ConfirmationMail($reservation));

        return response('sent')
        ->cookie('reservation_id',"$last->id",10)
        ->cookie('apartment',"$request->apartment_id",10)
        ->cookie('check_in',"$request->check_in",10)
        ->cookie('check_out',"$check_out",10);
    }

    public function confirmation(Request $request){
        $id = $request->cookie('reservation_id');
        $reservation = Reservation::findOrFail($id);
        $reservation->status = '1';
        $reservation->save();

        $apartment_id = $request->cookie('apartment');
        $check_in = $request->cookie('check_in');
        $check_out = $request->cookie('check_out');
        
        DB::statement("call filldates('$id','$apartment_id','$check_in','$check_out')");
        return response('reservation complited');
    }
}
