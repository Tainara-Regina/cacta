<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\CactaUsers as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CactaUsers extends \TCG\Voyager\Models\User
{
    use Notifiable;
    protected $guard = "cacta";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nome_contratante','nome_empresa','email','telefone','id_segmento','nome','verificacao','logo','segmento','cep','sobre','facebook','instagram','twitter','site'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
