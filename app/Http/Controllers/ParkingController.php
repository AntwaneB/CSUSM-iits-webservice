<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$parkings = Parking::with('coordinates')
		                   ->with('freeSlots')
		                   ->get();

    	foreach ($parkings as &$parking)
	    {
	    	if ($parking->freeSlots != null)
	    	    $parking->free_percent = intval($parking->freeSlots['free_slots'] / $parking->max_slots * 100.0);
	    	else
	    		$parking->free_percent = 100;
	    }

    	return $parkings;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        $parking->load('coordinates');
        $parking->load('freeSlots');
        $parking->load('slotsHistory');

	    if ($parking->freeSlots != null)
		    $parking->free_percent = intval($parking->freeSlots['free_slots'] / $parking->max_slots * 100.0);
	    else
		    $parking->free_percent = 100;

	    return $parking;
    }

}
