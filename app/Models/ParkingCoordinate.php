<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingCoordinate extends Model
{
	protected $fillable = ['latitude', 'longitude'];
	public $timestamps = false;

    public function parking()
    {
    	return $this->belongsTo(Parking::class);
    }
}
