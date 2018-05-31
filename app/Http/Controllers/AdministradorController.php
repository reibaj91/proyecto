<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class AdministradorController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'gestion'], function () {
            Route::get('/', 'AdministradorController@index')->name('gestion');
        });
    }

    public function index()
    {
        return view('admin.index');
    }


}
