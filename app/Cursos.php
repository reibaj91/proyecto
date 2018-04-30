<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';

    protected $fillable = [

        'idCurso',
        'nombre',
        'codEtapa',
        'created_at',
        'updated_at'
    ];

    public function seccion(){
        return $this->hasMany('App/Secciones');
    }

    public function etapas(){
        return $this->belongsTo('App/Etapas');
    }
}
