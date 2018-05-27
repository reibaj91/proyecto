<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PerfilApp;

class Aplicaciones extends Model
{
    protected $table = 'aplicaciones';

    protected $primaryKey='idaplicacion';
    public $incrementing=false;

    protected $fillable = [

        'idaplicacion',
        'nombre',
        'icono',
        'URL',
        'created_at',
        'updated_at'
    ];

    public function perfiles(){
        return $this->hasMany(PerfilApp::class, 'idaplicacion', 'idaplicacion');
    }

    public function scopeChecked($query,$idapp,$idperfil){
        return $query->join('perfilapp','perfilapp.idaplicacion','=','aplicaciones.idaplicacion')->where('perfilapp.idaplicacion','=',$idapp)->where('perfilapp.idperfil','=',$idperfil);
    }
}