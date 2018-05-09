<?php

namespace App\Http\Controllers;
use App\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class AlumnosController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'alumnos'], function (){
            Route::get('/', 'AlumnosController@index')->name('alumnos');

            Route::post('store', 'AlumnosController@store')->name('alumnos.store');
            Route::post('pre-validar', 'AlumnosController@preValidar')->name('alumnos.pre-validar');
        });
    }

    public function index(){
        $alumnos = Alumnos::all();

        return view('alumnos.alumnos')->with('alumnos',$alumnos);
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
                'nia' => $request->nia,
                'nombreCompleto' => $request->name,
                'dni' => $request->dni,
                'fecha_nacimiento' => $request->fecha,
                'sexo' => $request->sexo,
                'telefono' => $request->telefono,
                'telefono_urgencia' => $request->telefono_urgencia,
                'email' => $request->email,
                'idSeccion' => $request->seccion,
            ]);

            DB::commit();
            Session::flash('message', "Alumno creado con éxito");

            return redirect( route('alumnos.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

}
