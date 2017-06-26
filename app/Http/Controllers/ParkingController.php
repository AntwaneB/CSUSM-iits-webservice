<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\SlotsHistory;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
	/**
	 * @api {get} /parkings List all parkings
	 * @apiName index
	 * @apiGroup Parkings
	 *
	 * @apiDescription Get the list of all parkings with their coordinates and the count of free slots.
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
	 * @api {get} /parkings/:parking Show one parking
	 * @apiName show
	 * @apiGroup Parkings
	 *
	 * @apiDescription Get the information of one parking with the history of the free slots.
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

	/**
	 * @api {post} /parkings/:parking/parked Register as parked
	 * @apiName parked
	 * @apiGroup Parkings
	 *
	 * @apiDescription Removes one free slot from the specified parking and return the number of free slots.
	 */
    public function parked(Parking $parking)
    {
	    $parking->load('freeSlots');

	    $historyCheck = new \DateTime("15 minutes ago");

	    if ($parking->freeSlots != null
		    && new \DateTime($parking->freeSlots->created_at) >= $historyCheck)
	    {
		    $parking->freeSlots->free_slots--;
		    if ($parking->freeSlots->free_slots < 0)
			    $parking->freeSlots->free_slots = 0;
		    $parking->freeSlots->save();
	    }
	    else
	    {
	    	$history = new SlotsHistory();
	    	$history->parking_id = $parking->id;
	    	$history->free_slots = $parking->freeSlots->free_slots - 1;
		    if ($history->free_slots < 0)
			    $history->free_slots = 0;
	    	$history->save();
	    }

	    $parking->load('freeSlots');

	    return $parking;
    }

	/**
	 * @api {delete} /parkings/:parking/parked Unregister as parked
	 * @apiName unparked
	 * @apiGroup Parkings
	 *
	 * @apiDescription Adds one free slot from the specified parking and return the number of free slots.
	 */
    public function unparked(Parking $parking)
    {
	    $parking->load('freeSlots');

	    $historyCheck = new \DateTime("15 minutes ago");

	    if ($parking->freeSlots != null
	        && new \DateTime($parking->freeSlots->created_at) >= $historyCheck)
	    {
		    $parking->freeSlots->free_slots++;
		    if ($parking->freeSlots->free_slots > $parking->max_slots)
			    $parking->freeSlots->free_slots = $parking->max_slots;
		    $parking->freeSlots->save();
	    }
	    else
	    {
		    $history = new SlotsHistory();
		    $history->parking_id = $parking->id;
		    $history->free_slots = $parking->freeSlots->free_slots + 1;
		    if ($history->free_slots > $parking->max_slots)
			    $history->free_slots = $parking->max_slots;
		    $history->save();
	    }

	    $parking->load('freeSlots');

	    return $parking;
    }

}
