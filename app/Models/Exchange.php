<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Pivot;

class Exchange extends Pivot
{
	protected $table = 'exchanges';
	protected $primaryKey = 'entrega_id';
	
	public $timestamps = true;

	public function waste()
	{
		return $this->belongToMany('App\Models\Waste', 'exchange_details', 'entrega_id', 'desecho_id')->withTimestamps()->using('App\Models\ExchangeDetail');
	}
}
