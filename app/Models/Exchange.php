<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Pivot
{
	use Model;
	
	protected $table = 'exchanges';
	protected $primaryKey = 'entrega_id';
	
	public $timestamps = true;

	public function waste()
	{
		return $this->belongToMany('App\Models\Waste', 'exchange_details', 'entrega_id', 'desecho_id')->withTimestamps()->using('App\Models\ExchangeDetail');
	}
}
