<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

	protected $table = 'sponsors';
	protected $primaryKey = 'sponsor_id';

    public function benefits()
    {
    	return $this->hasMany('App\Models\Benefit', 'sponsor_id', 'sponsor_id');
    }
}
