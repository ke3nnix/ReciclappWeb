<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeDetail extends Model
{
	protected $table = 'exchange_details';
	protected $primaryKey = 'detalle_entrega_id';

	public function entrega()
	{
        return $this->belongsTo('App\Models\Exchange', 'entrega_id', 'entrega_id');
	}
	
	public function desecho()
	{
		return $this->belongsTo('App\Models\Waste', 'desecho_id', 'desecho_id');
	}
}