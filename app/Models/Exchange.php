<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Pivot;

class Exchange extends Pivot
{

	public $timestamps = true;

	public function waste()
	{
		return $this->belongToMany('App\Models\Waste')->withTimestamps()->using('App\Models\ExchangeDetail');
	}
}
