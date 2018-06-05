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

    public function index()
    {
        return view('admin.index');
    }

    public function inicio()
    {

        DB::table('alumnos')->delete();


    }

}
