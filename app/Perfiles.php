<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'idPerfil';
    public $incrementing= false;

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

    public function perfilapp(){
        return $this->hasMany('App/PerfilApp');
    }
}
