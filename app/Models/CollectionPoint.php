<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
	protected $table = 'collection_points';
	protected $primaryKey = 'acopio_id';

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\Exchange');
    }
}
