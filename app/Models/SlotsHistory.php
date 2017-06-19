<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotsHistory extends Model
{
	protected $table = "slots_history";

    public function parking()
    {
    	return $this->belongsTo(Parking::class);
    }

	public function setFreePercentAttribute($value)
	{
		$this->attributes['free_percent'] = intval($value);
	}
}
