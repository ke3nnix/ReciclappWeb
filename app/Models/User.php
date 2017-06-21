<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
        return $this->belongsToMany('App\Models\Benefit', 'user_benefits', 'usuario_id', 'beneficio_id')->withTimestamps()->using('App\Models\UserBenefit');
    }

    // public function collectionPoints()
    // {
    //     return $this->belongsToMany('App\Models\CollectionPoint', 'exchanges', 'colaborador_id', 'acopio_id')->withTimestamps()->using('App\Models\Exchange')->withPivot('total_puntos', 'created_at');
    // }
    public function entregas()
    {
        return $this->hasMany('App\Models\Exchange', 'colaborador_id', 'usuario_id');
    }

}
