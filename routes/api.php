<?php

use Illuminate\Http\Request;

Route::get('/parkings', 'ParkingController@index');
Route::get('/parkings/{parking}', 'ParkingController@show');