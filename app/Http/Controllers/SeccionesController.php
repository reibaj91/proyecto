<?php

namespace App\Http\Controllers;

use App\User;
use App\Cursos;
use App\Secciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class SeccionesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'secciones'], function (){
            Route::get('/', 'SeccionesController@index')->name('secciones');
            Route::get('alta', 'SeccionesController@alta')->name('secciones.create');

            Route::post('store', 'SeccionesController@store')->name('secciones.store');
            Route::post('pre-validar', 'SeccionesController@preValidar')->name('secciones.pre-validar');
        });
    }

    public function index(){
        $secciones = Secciones::all();

        return view('secciones.secciones')->with('secciones',$secciones);
    }

    public function alta()
    {
        $profesores = User::all();
        $cursos = Cursos::all();

        return view('secciones.alta')->with('profesores',$profesores)->with('cursos',$cursos);
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
                'idSeccion' => $request->idSeccion,
                'nombre' => $request->name,
                'tutor' => $request->tutor,
                'idCurso' => $request->idCurso,

            ]);

            DB::commit();
            Session::flash('message', "Seccion creada con éxito");

            return redirect( route('secciones.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }
}
