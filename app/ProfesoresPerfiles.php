<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfesoresPerfiles extends Model
{
    protected $table = 'perfiles_profesor';

    protected $primaryKey=['idUsuario','idPerfil'];
    public $incrementing=false;

    protected $fillable = [

        'idUsuario',
        'idPerfil',
        'created_at',
        'updated_at'
    ];

//    Relacion con la tabla perfiles
    public function perfiles(){
        return $this->hasOne(Perfiles::class,'idPerfil','idPerfil');
    }

//    Relacion con la tabla de usuarios
    public function profesores(){
        return $this->hasOne(User::class, 'idUsuario','idUsuario');
    }
}
