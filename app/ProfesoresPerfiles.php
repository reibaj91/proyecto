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

    public function perfiles(){
        return $this->belongsTo('App/Perfiles');
    }

    public function profesores(){
        return $this->belongsTo('App/User');
    }
}
