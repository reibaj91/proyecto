<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapas extends Model
{
    protected $table = 'etapas';

    protected $fillable = [

        'codEtapa',
        'nombre',
        'coordinador',
        'etapapp',
        'created_at',
        'updated_at'
    ];

    public function cursos(){
        return $this->hasMany('App/Cursos');
    }

    public function profesores(){
        return $this->belongsTo('App/Profesores');
    }

    public function subetapas(){
        return $this->hasMany('App/Etapas');
    }

    public function etapapp(){
        return $this->belongsTo('App/Etapas');
    }
}
