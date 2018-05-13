<?php

namespace App\Http\Controllers;

use App\PerfilApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class PerfilAppController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'PerfilApp'], function (){
            Route::get('/', 'PerfilAppController@index')->name('perfilapp');

            Route::post('store', 'PerfilAppController@store')->name('perfilapp.store');
            Route::post('pre-validar', 'PerfilAppController@preValidar')->name('perfilapp.pre-validar');
        });
    }

    public function index(){
        $perfilapp = Aplicaciones::all();

        return view('perfilapp.perfilapp')->with('perfilapp',$perfilapp);
    }


}
