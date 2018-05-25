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

    public function etapaPrincipal(){
        return $this->hasOne(Etapas::class, 'codEtapa', 'etapapp');
    }

    public function nombreCoordinador(){
        return $this->hasOne(User::class, 'idUsuario', 'coordinador');
    }

    public function cursos(){
        return $this->hasMany('App/Cursos');
    }

    public function profesores(){
        return $this->belongsTo('App/User');
    }

    public function subetapas(){
        return $this->hasMany('App/Etapas');
    }

    public function etapapp(){
        return $this->belongsTo('App/Etapas');
    }
}
