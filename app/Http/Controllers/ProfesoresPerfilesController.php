<?php

namespace App\Http\Controllers;

use App\ProfesoresPerfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class ProfesoresPerfilesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'profesoresperfiles'], function (){
            Route::get('/', 'ProfesoresPerfilesController@index')->name('profesoresperfiles');
        });
    }

    public function index(){
        $profesoresperfiles = ProfesoresPerfiles::all();

        return view('profesoresperfiles.profesoresperfiles')->with('profesoresperfiles',$profesoresperfiles);
    }

}
