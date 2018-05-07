<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [

        'nia',
        'nombreCompleto',
        'dni',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'telefono_urgencia',
        'email',
        'idSeccion',
        'created_at',
        'updated_at'
    ];

    public function seccion(){
        return $this->belongsTo('App/Secciones');
    }
}
