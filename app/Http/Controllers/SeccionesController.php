<?php

namespace App\Http\Controllers;

use App\Secciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class SeccionesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'secciones'], function (){
            Route::get('/', 'SeccionesController@index')->name('secciones');
        });
    }

    public function index(){
        $secciones = Secciones::all();

        return view('secciones.secciones')->with('secciones',$secciones);
    }
}
