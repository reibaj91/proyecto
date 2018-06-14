<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 15/05/2018
 * Time: 21:05
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PerfilApp extends Model
{
    protected $table = 'perfilapp';

    protected $fillable = [

        'idperfil',
        'idaplicacion',
        'created_at',
        'updated_at'
    ];

//    Relacion con la tabla aplicaciones
    public function aplicaciones(){
        return $this->belongsTo(Aplicaciones::class, 'idaplicacion','idaplicacion');
    }

//    Relacion con la tabla perfiles
    public function perfiles(){
        return $this->belongsTo(Perfiles::class, 'idPerfil','idperfil');
    }

    //    Funcion con una consulta para ser reutilizada y agilizar los procesos
    public function scopeAplicacionesUsuario($query){
        return $query->whereHas('perfiles',function ($query){
           $query->whereHas('perfiles_profesor',function ($query){
               $query->where('idUsuario',Auth::id());
           }) ;
        });
    }
}