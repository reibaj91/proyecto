<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    protected $table = 'profesores';

    protected $fillable = [

        'idUsuario',
        'correo',
        'nombre',
        'pass',
        'baja_temporal',
        'created_at',
        'updated_at',
        'remember_token'
    ];

    public function seccion(){
        return $this->hasOne('App/Secciones');
    }

    public function etapas(){
        return $this->hasMany('App/Etapas');
    }

    public function profesores_perfiles(){
        return $this->hasMany('App/ProfesoresPerfiles');
    }
}
