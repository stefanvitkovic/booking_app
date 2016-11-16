<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;

class ApartmentController extends Controller
{
    public function index(){
    	$apartments = Apartment::all();
    	return view('apartments',['apartments'=>$apartments]);
    }

    public function create(){
    	return view('add_apartment');
    }

    public function store(Request $request){
    	$new_apartment = new Apartment($request->input());
    	$new_apartment->save();
    	$apartments = Apartment::all();
    	return response()->view('apartments',['apartments'=>$apartments]);
    }
}
