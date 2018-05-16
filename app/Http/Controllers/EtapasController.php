<?php

namespace App\Http\Controllers;

use App\User;
use App\Etapas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class EtapasController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Etapas'], function (){
            Route::get('/', 'EtapasController@index')->name('etapas');
            Route::get('crear', 'EtapasController@create')->name('etapas.create');

            Route::post('store', 'EtapasController@store')->name('etapas.store');
            Route::post('pre-validar', 'EtapasController@preValidar')->name('etapas.pre-validar');
        });
    }

    public function index(){
        $etapas = Etapas::all();

        return view('etapas.etapas')->with('etapas',$etapas);
    }

    public function create() {
        $profesores = User::all();
        $etapas = Etapas::all();

        return view ('etapas.alta')->with('profesores',$profesores)->with('etapas',$etapas);
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
                'coordinador' => $request->coordinador,
                'etapapp' => $request->etapapp,
            ]);

            DB::commit();
            Session::flash('message', "Etapa creado con éxito");

            return redirect( route('etapas.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }
}
