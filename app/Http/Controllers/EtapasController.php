<?php

namespace App\Http\Controllers;

use App\ProfesoresPerfiles;
use App\User;
use App\Etapas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EtapasController extends Controller
{

    static function routes(){
        Route::group(['prefix'=> 'Etapas'], function (){
            Route::get('/', 'EtapasController@index')->name('etapas');
            Route::get('crear', 'EtapasController@create')->name('etapas.create');

            Route::get('editar/{codEtapa}', 'EtapasController@editar')->name('etapas.editar')->where('codEtapa','[0-9]+');
            Route::post('edit', 'EtapasController@edit')->name('etapas.edit');

            Route::post('borrar','EtapasController@delete')->name('etapas.delete');

            Route::post('store', 'EtapasController@store')->name('etapas.store');
            Route::post('pre-validar', 'EtapasController@preValidar')->name('etapas.pre-validar');
        });
    }

    public function index(){
        $etapas = Etapas::all();

        return view('etapas.etapas', compact('etapas'));
    }

    public function create() {
        $profesores = User::all();
        $etapas = Etapas::all();

        return view ('etapas.alta')->with('profesores',$profesores)->with('etapas',$etapas);
    }

    public function editar($codEtapa)
    {
        $etapas = Etapas::where('codEtapa', $codEtapa)->first();
        $etapapp = Etapas::all();
        $profesores = User::all();
        return view('etapas.editar', [
            'etapas' => $etapas,
            'profesores' => $profesores,
            'etapapp' => $etapapp
        ]);
    }

    public function edit(Request $request){

        $this->validatorEdit($request->all())->validate();
        $etapa=Etapas::where('codEtapa','=',$request->id)->first();

        try{
            DB::beginTransaction();

            Etapas::where('codEtapa','=',$request->id)
                        ->update([
                            'nombre'=>$request->nombre,
                            'coordinador'=>$request->coordinador,
                            'etapapp'=>$request->etapapp
                        ]);



            if($etapa->coordinador != $request->coordinador)
            {
//                $coordinador=ProfesoresPerfiles::where('idUsuario','=',$etapa->coordinador)->where('idPerfil','=',3)->first();

                $deleted = DB::delete('delete from profesores_perfiles where idUsuario='.$etapa->coordinador.' and idPerfil=3');

                ProfesoresPerfiles::create([
                    'idUsuario' => $request->coordinador,
                    'idPerfil' => 3,
                ]);
            }

            DB::commit();
            Session::flash('message', "Etapa editada con éxito");

            return redirect(route('etapas'));
        } catch (\Exception $e) {
            dd($e);
            Session::flash('message', "No se ha podido editar la etapa");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('etapas'));
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:etapas,nombre',
        ]);
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
            Etapas::create([
                'nombre' => $request->nombre,
                'coordinador' => $request->coordinador,
                'etapapp' => $request->etapapp,
            ]);

            if ($request->coordinador)
            {
                $pp=ProfesoresPerfiles::create([
                    'idUsuario' => $request->coordinador,
                    'idPerfil' => 3,
                ]);
            }



            DB::commit();
            Session::flash('message', "Etapa creada con éxito");

            return redirect( route('etapas.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:etapas,nombre,' . $data['id'].',codEtapa',
        ]);
    }

    public function delete(Request $request){


        $etapas = Etapas::where('codEtapa','=',$request->codEtapa);

        try {
            DB::beginTransaction();

            $etapas->delete();

            DB::commit();
            $request->session()->flash('success', "Etapa eliminada con éxito");

            return redirect(route('etapas'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }

    }
}
