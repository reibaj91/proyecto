<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alumnos extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'nia';
    public $incrementing = false;

//    Campo "virtual" que nos permite dar formato a la fecha
    protected $appends = [
        'fechaFormateada'
    ];
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

//    Relacion con la tabla secciones
    public function seccion(){
        return $this->belongsTo('App/Secciones');
    }
//    Funcion para formatear la fecha
    public function getFechaFormateadaAttribute() {
        return Carbon::parse($this->fechaNacimiento)->format('d/m/Y');
    }
}
