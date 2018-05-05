<?php

namespace App\Http\Controllers;

use App\Etapas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class EtapasController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Etapas'], function (){
            Route::get('/', 'EtapasController@index')->name('etapas');
        });
    }

    public function index(){
        $etapas = Etapas::all();

        return view('etapas.etapas')->with('etapas',$etapas);
    }
}
