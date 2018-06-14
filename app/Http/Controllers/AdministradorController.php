<?php

namespace App\Http\Controllers;

use App\Alumnos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AdministradorController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'gestion'], function () {
            Route::get('/', 'AdministradorController@index')->name('gestion');
            Route::get('inicio', 'AdministradorController@inicio')->name('gestion.inicio');
        });
    }

//    Nos muestra la vista principal al acceder a nuestra aplicacion
    public function index()
    {
        return view('admin.index');
    }


//    Esta funcion borra todos los alumnos de la aplicacion
    public function inicio()
    {

        DB::table('alumnos')->delete();

    }

}
