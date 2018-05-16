<?php

namespace App\Http\Controllers;

use App\Perfiles;
use App\Aplicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class AplicacionesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Aplicaciones'], function (){
            Route::get('/', 'AplicacionesController@index')->name('aplicaciones');
            Route::get('nueva', 'AplicacionesController@nueva')->name('aplicaciones.nueva');

            Route::post('store', 'AplicacionesController@store')->name('aplicaciones.store');
            Route::post('pre-validar', 'AplicacionesController@preValidar')->name('aplicaciones.pre-validar');
        });
    }

    public function index(){
        $aplicaciones = Aplicaciones::all();

        return view('aplicaciones.aplicaciones')->with('aplicaciones',$aplicaciones);
    }

    public function nueva()
    {
        $perfiles = Perfiles::all();

        return view('aplicaciones.alta')->with('perfiles',$perfiles);
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
                'nombre' => $request->name,
                'icono' => $request->icono,
                'URL' => $request->url,
            ]);

            DB::commit();
            Session::flash('message', "Curso creado con éxito");

            return redirect( route('aplicaciones.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }
}
