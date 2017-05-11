<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    public function exchanges()
	{
	    return $this->belongToMany('App\Models\Exchange', 'exchange_details', 'desecho_id', 'entrega_id')->withTimestamps()->using('App\Models\ExchangeDetail');
	}

  public function waste()
  {
    return $this->hasMany('App\Models\Waste', 'desecho_id');
  }
}
