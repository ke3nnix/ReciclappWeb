<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function benefits()
    {
    	return $this->hasMany('App\Models\Benefit');
    }
}
