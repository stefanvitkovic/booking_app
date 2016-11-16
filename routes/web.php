<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BookingController@index');

Route::post('/','BookingController@store')->middleware('availability');

Route::post('check','BookingController@check')->middleware('check');

Route::get('confirmation','BookingController@confirmation')->middleware('confirmation');

Route::get('apartments','ApartmentController@index')->name('apartments');

Route::get('apartments/create','ApartmentController@create');

Route::post('apartments','ApartmentController@store')->name('add_ap');