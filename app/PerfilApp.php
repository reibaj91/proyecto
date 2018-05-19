<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 15/05/2018
 * Time: 21:05
 */

namespace App;


class PerfilApp
{
    protected $table = 'perfilapp';

    protected $fillable = [

        'idperfil',
        'idaplicacion',
        'created_at',
        'updated_at'
    ];

    public function aplicaciones(){
        return $this->belongsTo('App/Aplicaciones');
    }

    public function perfiles(){
        return $this->belongsTo('App/Perfiles');
    }
}