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

    public function aplicaciones(){
        return $this->belongsTo(Aplicaciones::class, 'idaplicacion','idaplicacion');
    }

    public function perfiles(){
        return $this->belongsTo(Perfiles::class, 'idPerfil','idperfil');
    }

    public function scopeAplicacionesUsuario($query){
        return $query->whereHas('perfiles',function ($query){
           $query->whereHas('perfiles_profesor',function ($query){
               $query->where('idUsuario',Auth::id());
           }) ;
        });
    }
}