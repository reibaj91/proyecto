<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
    protected $table = 'secciones';

    protected $primaryKey = 'idSeccion';
    public $incrementing = false;

    protected $fillable = [

        'idSeccion',
        'nombre',
        'tutor',
        'idCurso',
        'idSeccionColegio',
        'created_at',
        'updated_at'
    ];


//    Relacion con la tabla cursos
    public function Curso(){
        return $this->hasOne(Cursos::class, 'idCurso', 'idCurso');
    }

//    Relacion con la tabla usuarios
    public function Tutor(){
        return $this->hasOne(User::class, 'idUsuario', 'tutor');
    }

//    Relacion con la tabla cursos
    public function cursos(){
        return $this->belongsTo('App/Cursos');
    }

//    relacion con la tabla usuarios
    public function profesores(){
        return $this->hasOne('App/User');
    }

//    Relacion con la tabla alumnos
    public function alumnos(){
        return $this->hasMany('App/Alumnos');
    }
}
