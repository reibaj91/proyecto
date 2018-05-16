<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplicaciones extends Model
{
    protected $table = 'aplicaciones';

    protected $fillable = [

        'idaplicacion',
        'nombre',
        'icono',
        'URL',
        'created_at',
        'updated_at'
    ];

    public function perfiles(){
        return $this->hasMany('App/Perfiles');
    }
}