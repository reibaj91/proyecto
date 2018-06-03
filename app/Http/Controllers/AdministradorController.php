<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class AdministradorController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'gestion'], function () {
            Route::get('/', 'AdministradorController@index')->name('gestion');
        });
    }

    public function index()
    {
        return view('admin.index');
    }

    public function inicio()
    {
        $profesoresperfiles=ProfesoresPerfiles::where('idPerfil','<>',1);
        if ($profesoresperfiles != "[]") {
            DB::beginTransaction();
            $profesoresperfiles->delete();
            DB::commit();
        }

        $profesores=User::where('idUsuario','<>',1);
        if ($profesores != "[]") {
            DB::beginTransaction();
            $profesores->delete();
            DB::commit();
        }
    }

}
