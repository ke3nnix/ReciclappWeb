<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{

	protected $table = 'waste';
	protected $primaryKey = 'desecho_id';

    public function exchanges()
	{
	    return $this->belongToMany('App\Models\Exchange', 'exchange_details', 'desecho_id', 'entrega_id')->withTimestamps()->using('App\Models\ExchangeDetail');
	}

  public function transfers()
  {
    return $this->hasMany('App\Models\Transfer', 'desecho_id', 'desecho_id');
  }
}
