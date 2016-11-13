<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

use DB;

use App\Mail\ConfirmationMail;

use Illuminate\Support\Facades\Mail;

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
    	
        Mail::to('test@gmail.com')->send(new ConfirmationMail($last->id));

    	return response()->view('test')->cookie('reservation_id',"$last->id",10);
    }

    public function confirmation(Request $request){
        $id = $request->cookie('reservation_id');
        $reservation = Reservation::findOrFail($id);
        $reservation->status = '1';
        $reservation->save();

        return response('reservation complited');
    }
}
