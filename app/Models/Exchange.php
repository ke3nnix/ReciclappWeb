<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Pivot;

class Exchange extends Pivot
{

	public $timestamps = true;

	public function waste()
	{
		return $this->belongToMany('App\Models\Waste', 'exchange_details', 'entrega_id', 'desecho_id')->withTimestamps()->using('App\Models\ExchangeDetail');
	}
}
