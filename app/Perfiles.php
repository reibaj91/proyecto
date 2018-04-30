<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table = 'perfiles';

    protected $fillable = [

        'idPerfil',
        'tipo',
        'nombre',
        'created_at',
        'updated_at'
    ];

    public function profesores_perfiles(){
        return $this->hasMany('App/ProfesoresPerfiles');
    }
}
