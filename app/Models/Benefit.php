<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Benefit extends Model
{
	protected $table = 'benefits';
	protected $primaryKey = 'beneficio_id';

	public $timestamps = true;

	public function sponsor()
	{
		return $this->belongsTo('App\Models\Sponsor', 'sponsor_id', 'sponsor_id');
	}


	public function users()
	{
		return $this->belongsToMany('App\Models\User', 'user_benefits', 'beneficio_id', 'usuario_id')->withTimestamps()->using('App\Models\UserBenefit');
	}
}
