<?php

namespace App\Http\Controllers;

use App\ProfesoresPerfiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProfesoresPerfilesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'gestor'], function (){
            Route::get('asignar', 'ProfesoresPerfilesController@asignar')->name('gestor.asignar');
            Route::post('eliminar', 'ProfesoresPerfilesController@eliminar')->name('gestor.eliminar');
            Route::post('store', 'ProfesoresPerfilesController@store')->name('gestor.store');
        });
    }
}
