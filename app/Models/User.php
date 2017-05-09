<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Benefit;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function benefits()
    {
        return $this->belongsToMany('App\Models\Benefit')->using('App\Models\UserBenefit');
    }

    public function colelctionPoints()
    {
        return $this->belongsToMany('App\Models\CollectionPoint')->using('App\Models\Exchange');
    }

}
