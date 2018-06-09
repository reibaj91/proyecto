<?php

namespace App;

use Illuminate\Support\Facades\Auth;
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
        'tipo',
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


    public function scopePerfiles($query){
        return $query->whereHas('perfil', function ($query)  {
            $query->where('perfiles_profesor.idUsuario', '=', Auth::id())->whereIn('perfiles_profesor.idPerfil', [1,4]);
        });
    }

    public function scopeGestor($query){
        return $query->whereHas('perfil', function ($query)  {
            $query->where('perfiles_profesor.idUsuario', '=', Auth::id())->where('perfiles_profesor.idPerfil', '=', 4);
        });
    }

    public function scopeAdministrador($query){
        return $query->whereDoesntHave('perfil', function ($query)  {
            $query->whereIn('perfiles_profesor.idPerfil',  [1,4]);
        });
    }

    public function scopeNoAdministrador($query){
        return $query->whereDoesntHave('perfil', function ($query)  {
            $query->whereIn('perfiles_profesor.idPerfil',  [1]);
        });
    }


    public function perfil(){
        return $this->hasMany(ProfesoresPerfiles::class, 'idUsuario', 'idUsuario');
    }


    public function seccion()
    {
        return $this->hasOne('App/Secciones');
    }

    public function etapas()
    {
        return $this->hasMany('App/Etapas');
    }

    public function perfiles_profesor()
    {
        return $this->hasMany('App/ProfesoresPerfiles');
    }


}
