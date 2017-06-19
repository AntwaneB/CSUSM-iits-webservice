<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    public function coordinates()
    {
    	return $this->hasMany(ParkingCoordinate::class);
    }

    public function slotsHistory()
    {
    	return $this->hasMany(SlotsHistory::class);
    }

	public function freeSlots()
	{
		return $this->hasOne(SlotsHistory::class)
					->orderBy('updated_at', 'DESC');
	}
}
