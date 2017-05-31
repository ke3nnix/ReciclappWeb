<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserBenefit extends Pivot
{

	protected $table = 'user_benefits';
	protected $primaryKey = 'usuario_beneficio_id';
	public $timestamps = true;
    
}