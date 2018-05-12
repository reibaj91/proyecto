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
            Route::get('crear', 'CursosController@crear')->name('cursos.crear');

            Route::post('store', 'CursosController@store')->name('cursos.store');
            Route::post('pre-validar', 'CursosController@preValidar')->name('cursos.pre-validar');
        });
    }

    public function index(){
        $cursos = Cursos::all();

        return view('cursos.cursos')->with('cursos',$cursos);
    }

    public function crear() {
        return view ('cursos.alta');
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
                'idCurso' => $request->idCurso,
                'nombre' => $request->name,
                'codEtapa' => $request->codEtapa,
            ]);

            DB::commit();
            Session::flash('message', "Curso creado con éxito");

            return redirect( route('cursos.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }
}
