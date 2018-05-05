<?php

namespace App\Http\Controllers;

use App\Profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class ProfesoresController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'profesores'], function (){
            Route::get('/', 'ProfesoresController@index')->name('profesores');
        });
    }

    public function index(){
        $profesores = Profesores::all();

        return view('profesores.profesores')->with('profesores',$profesores);
    }

}
