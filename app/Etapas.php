<?php

namespace App;

use App\Profesores;
use Illuminate\Database\Eloquent\Model;

class Etapas extends Model
{
    protected $table = 'etapas';

    protected $primaryKey='codEtapa';


    protected $fillable = [

        'codEtapa',
        'idEtapaColegio',
        'nombre',
        'coordinador',
        'etapapp',
        'created_at',
        'updated_at'
    ];

//    Relacion Reflexiva
    public function etapaPrincipal(){
        return $this->hasOne(Etapas::class, 'codEtapa', 'etapapp');
    }

//    Relacion con la tabla usuarios
    public function nombreCoordinador(){
        return $this->hasOne(User::class, 'idUsuario', 'coordinador');
    }

//    Relacion con la tabla cursos
    public function cursos(){
        return $this->hasMany('App/Cursos');
    }

//    Relacion con la tabla ususarios
    public function profesores(){
        return $this->belongsTo('App/User');
    }

//    Relacion reflexiva
    public function subetapas(){
        return $this->hasMany('App/Etapas');
    }

    public function etapapp(){
        return $this->belongsTo('App/Etapas');
    }
}
