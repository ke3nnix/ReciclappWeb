<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
	protected $table = 'collection_points';
	protected $primaryKey = 'acopio_id';

    protected $hidden = ['estado'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User','exchanges', 'acopio_id', 'colaborador_id')->withTimestamps()->using('App\Models\Exchange');
    }
}
