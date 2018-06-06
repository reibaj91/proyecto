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


    public function perfiles_profesor(){
        return $this->hasMany(ProfesoresPerfiles::class, 'idPerfil','idPerfil');
    }

    public function perfilapp(){
        return $this->hasMany(PerfilApp::class, 'idPerfil','idPerfil');
    }
}
