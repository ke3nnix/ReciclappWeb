<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Benefit;

class User extends Authenticatable
{
    use Notifiable;

	protected $table = 'users';
	protected $primaryKey = 'usuario_id';

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
        return $this->belongsToMany('App\Models\Benefit', 'user_benefits', 'colaborador_id', 'beneficio_id')->using('App\Models\UserBenefit');
    }

    public function collectionPoints()
    {
        return $this->belongsToMany('App\Models\CollectionPoint', 'exchanges', 'colaborador_id', 'acopio_id')->using('App\Models\Exchange');
    }

}
