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
        'created_at',
        'updated_at'
    ];


    public function Curso(){
        return $this->hasOne(Cursos::class, 'idCurso', 'idCurso');
    }

    public function Tutor(){
        return $this->hasOne(User::class, 'idUsuario', 'tutor');
    }
    
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
