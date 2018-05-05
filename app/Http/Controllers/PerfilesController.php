<?php

namespace App\Http\Controllers;

use App\Perfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class PerfilesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Perfiles'], function (){
            Route::get('/', 'PerfilesController@index')->name('perfiles');
        });
    }

    public function index(){
        $perfiles = Perfiles::all();

        return view('perfiles.perfiles')->with('perfiles',$perfiles);
    }
}
