<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Waste;

class Transfer extends Model
{

	protected $table = 'transfers';
	protected $primaryKey = 'transferencia_id';

	public function waste()
	{
		return $this->belongsTo('App\Models\Waste', 'desecho_id');
	}
}
