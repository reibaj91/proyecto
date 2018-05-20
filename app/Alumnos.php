<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';

    protected $primaryKey = 'nia';
    public $incrementing = false;

    protected $fillable = [

        'nia',
        'nombreCompleto',
        'dni',
        'fechaNacimiento',
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
