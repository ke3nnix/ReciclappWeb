<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Pivot;

class ExchangeDetail extends Pivot
{
	protected $table = 'exchange_details';
	protected $primaryKey = 'detalle_entrega_id';

}