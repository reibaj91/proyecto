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
            Route::get('nuevo', 'PerfilesController@nuevo')->name('perfiles.nuevo');

            Route::post('store', 'PerfilesController@store')->name('perfiles.store');
            Route::post('pre-validar', 'PerfilesController@preValidar')->name('perfiles.pre-validar');
        });
    }

    public function index(){
        $perfiles = Perfiles::all();

        return view('perfiles.perfiles')->with('perfiles',$perfiles);
    }

    public function nuevo()
    {

        return view('perfiles.alta');
    }

    public function preValidar(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();
            User::create([
                'tipo' => $request->tipo,
                'nombre' => $request->name,

            ]);

            DB::commit();
            Session::flash('message', "Perfil creado con éxito");

            return redirect( route('perfiles.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }
}
