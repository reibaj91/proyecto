<?php

namespace App\Http\Controllers;

use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class CursosController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Cursos'], function (){
            Route::get('/', 'CursosController@index')->name('cursos');
        });
    }

    public function index(){
        $cursos = Cursos::all();

        return view('cursos.cursos')->with('cursos',$cursos);
    }
}
