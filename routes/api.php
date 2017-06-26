<?php

Route::get('/parkings', 'ParkingController@index');
Route::get('/parkings/{parking}', 'ParkingController@show');

Route::post('/parkings/{parking}/parked', 'ParkingController@parked');
Route::delete('/parkings/{parking}/parked', 'ParkingController@unparked');
