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
        'idCursoColegio',
        'created_at',
        'updated_at'
    ];



    public function Etapa(){
        return $this->hasOne(Etapas::class, 'codEtapa', 'codEtapa');
    }

    public function seccion(){
        return $this->hasMany('App/Secciones');
    }

    public function etapas(){
        return $this->belongsTo('App/Etapas');
    }
}
