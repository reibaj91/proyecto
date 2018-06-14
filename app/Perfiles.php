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
        'nombre',
        'created_at',
        'updated_at'
    ];


//    Relacion con la tabla usuariosPerfiles
    public function perfiles_profesor(){
        return $this->hasMany(ProfesoresPerfiles::class, 'idPerfil','idPerfil');
    }

//    Relacion con la tabla perfilapp
    public function perfilapp(){
        return $this->hasMany(PerfilApp::class, 'idPerfil','idPerfil');
    }
}
