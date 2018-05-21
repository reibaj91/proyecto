<?php

namespace App\Http\Controllers;

use App\PerfilApp;
use App\Perfiles;
use App\Aplicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:aplicaciones,nombre',
            'url' => 'required|max:255|unique:aplicaciones,URL',
            'icono' => 'required|mimes:jpeg,bmp,png'
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
            $aplicacion=Aplicaciones::create([
                'nombre' => $request->nombre,
                'icono' => $request->icono,
                'URL' => $request->url,
            ]);


            foreach ($request->perfil as $item)
            {
                PerfilApp::create([
                    'idperfil' => $item,
                    'idaplicacion' => $aplicacion->idaplicacion,
                ]);
            }



            if ($request->hasFile('icono')) {
                $imageName = $aplicacion->idaplicacion . '.' . $request->file('icono')->getClientOriginalExtension();

                $request->file('icono')->move(base_path() . '/public/images/aplicaciones/', $imageName);$aplicacion->icono = $imageName;

                $aplicacion->update();
            }


            DB::commit();
            Session::flash('message', "Aplicación creada con éxito");

            return redirect( route('aplicaciones.nueva'));

        } catch (\Exception $e) {
            dd($e);
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }
}
