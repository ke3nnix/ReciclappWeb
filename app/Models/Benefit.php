<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Benefit extends Model
{
	public function sponsor()
	{
		return $this->belongsTo('App\Models\Sponsor');
	}


	public function users()
	{
		return $this->belongsToMany('App\Models\User', 'user_benefits', 'beneficio_id', 'colaborador_id')->using('App\Models\UserBenefit');
	}
}
