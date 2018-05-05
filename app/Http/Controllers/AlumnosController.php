<?php

namespace App\Http\Controllers;
use App\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class AlumnosController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'alumnos'], function (){
            Route::get('/', 'AlumnosController@index')->name('alumnos');
        });
    }

    public function index(){
        $alumnos = Alumnos::all();

        return view('alumnos.alumnos')->with('alumnos',$alumnos);
    }

}
