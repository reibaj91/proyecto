<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';

    protected $primaryKey = 'idCurso';
    public $incrementing = false;

    protected $fillable = [

        'idCurso',
        'nombre',
        'codEtapa',
        'codCursoColegio',
        'created_at',
        'updated_at'
    ];


//    Relacion con la tabla de etapas
    public function Etapa(){
        return $this->hasOne(Etapas::class, 'codEtapa', 'codEtapa');
    }

//    Relacion con la tabla secciones
    public function seccion(){
        return $this->hasMany('App/Secciones');
    }

    public function etapas(){
        return $this->belongsTo('App/Etapas');
    }
}
