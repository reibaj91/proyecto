<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuela';

    protected $fillable = [

        'codigo_Centro',
        'nombre_Centro',
        'domicilio',
        'localidad',
        'codigo_postal',
        'CIF_centro',
        'correo',
        'telefono',
        'HorasFct',
        'created_at',
        'updated_at'
    ];
}
