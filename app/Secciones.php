<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
    protected $table = 'secciones';

    protected $fillable = [

        'idSeccion',
        'nombre',
        'tutor',
        'idCuros',
        'created_at',
        'updated_at'
    ];

    public function cursos(){
        return $this->belongsTo('App/Cursos');
    }

    public function profesores(){
        return $this->hasOne('App/User');
    }

    public function alumnos(){
        return $this->hasMany('App/Alumnos');
    }
}
