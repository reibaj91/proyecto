<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'profesores';
    protected $primaryKey = 'idUsuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idUsuario',
        'email',
        'nombre',
        'password',
        'baja_temporal',
        'created_at',
        'updated_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function seccion()
    {
        return $this->hasOne('App/Secciones');
    }

    public function etapas()
    {
        return $this->hasMany('App/Etapas');
    }

    public function profesores_perfiles()
    {
        return $this->hasMany('App/ProfesoresPerfiles');
    }


}
