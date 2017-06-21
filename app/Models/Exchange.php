<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
	
	protected $table = 'exchanges';
	protected $primaryKey = 'entrega_id';
	
	public $timestamps = true;

	public function waste()
	{
		return $this->belongToMany('App\Models\Waste', 'exchange_details', 'entrega_id', 'desecho_id')->withTimestamps()->using('App\Models\ExchangeDetail');
	}

	public function usuario()
	{
        return $this->belongsTo('App\Models\User', 'colaborador_id', 'usuario_id');
	}

	public function supervisor()
	{
        return $this->belongsTo('App\Models\User', 'empleado_id', 'usuario_id');
	}

	public function detalles()
	{
        return $this->hasMany('App\Models\ExchangeDetail', 'entrega_id', 'entrega_id');
	}

	public function acopio()
	{
		return $this->belongsTo('App\Models\CollectionPoint', 'acopio_id', 'acopio_id');
	}

}
