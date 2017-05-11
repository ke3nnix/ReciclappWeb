<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\Exchange');
    }
}
