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
use Illuminate\Support\Facades\File;

class AplicacionesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Aplicaciones'], function (){
            Route::get('/', 'AplicacionesController@index')->name('aplicaciones');
            Route::get('nueva', 'AplicacionesController@nueva')->name('aplicaciones.nueva');

            Route::get('editar/{id}', 'AplicacionesController@editar')->name('aplicaciones.editar')->where('id', '[0-9]+');
            Route::post('edit', 'AplicacionesController@edit')->name('aplicaciones.edit');

            Route::post('borrar', 'AplicacionesController@delete')->name('aplicaciones.delete');

            Route::post('store', 'AplicacionesController@store')->name('aplicaciones.store');
            Route::post('pre-validar', 'AplicacionesController@preValidar')->name('aplicaciones.pre-validar');
        });
    }

//    Vista con todas las aplicacciones en la que podemos editar y borra
    public function index(){
        $aplicaciones = Aplicaciones::all();

        return view('aplicaciones.aplicaciones')->with('aplicaciones',$aplicaciones);
    }

//    Vista para crear las aplicaciones
    public function nueva()
    {
        $perfiles = Perfiles::all();

        return view('aplicaciones.alta')->with('perfiles',$perfiles);
    }

//    Vista para editar las aplicaciones
    public function editar($id)
    {
        $aplicaciones = Aplicaciones::where('idaplicacion', $id)->first();
        $perfiles= Perfiles::all();
        $perfilapp= PerfilApp::where('idaplicacion', $id);
        return view('aplicaciones.editar', [
            'aplicaciones' => $aplicaciones,
            'perfiles' => $perfiles,
            'perfilapp' =>$perfilapp,
        ]);
    }


//    funcion para editar las aplicaciones
    public function edit(Request $request)
    {

        $this->validatorEdit($request->all())->validate();

        $aplicaciones = Aplicaciones::where('idaplicacion','=',$request->id)->first();

        DB::delete('delete from perfilapp where idaplicacion='.$aplicaciones->idaplicacion);

        if ($request->hasFile('icono')) {
            $filename = public_path(). '/images/aplicaciones/' . $aplicaciones->icono;
            File::delete($filename);
        }

        try {
            DB::beginTransaction();

            $aplicaciones->idaplicacion = $request->idapp;
            $aplicaciones->nombre = $request->nombre;
            if($request->icono != null)
                $aplicaciones->icono = $request->icono;

            $aplicaciones->URL = $request->url;


            if ($request->hasFile('icono')) {
                $imageName = $aplicaciones->idaplicacion . '.' . $request->file('icono')->getClientOriginalExtension();

                $request->file('icono')->move(base_path() . '/public/images/aplicaciones/', $imageName);$aplicaciones->icono = $imageName;

                $aplicaciones->update();
            }

            $aplicaciones->save();

            foreach ($request->perfil as $item)
            {
                PerfilApp::create([
                    'idperfil' => $item,
                    'idaplicacion' => $request->idapp,
                ]);
            }

            DB::commit();
            Session::flash('message', "Aplicación editada con éxito");

            return redirect(route('aplicaciones'));
        } catch (\Exception $e) {
            dd($e);
            Session::flash('message', "No se ha podido editar la aplicación");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('aplicaciones'));
    }


//    funcion para validar el formulario de edicion
    protected function validatorEdit(array $data)
    {
        $mesanje = [
            'icono.dimensions'=>'El tamaño de los iconos debe ser entre 50x50 y 100x100 pixeles'];

        return Validator::make($data, [
            'idapp' => 'required|numeric|min:1|unique:aplicaciones,idaplicacion,'.$data['id'].',idaplicacion',
            'nombre' => 'required|max:255|unique:aplicaciones,nombre,'.$data['id'].',idaplicacion',
            'icono' => 'nullable|mimes:jpeg,bmp,png|dimensions:max_width=100,max_height=100,min_width=50,min_height=50',
            'url' => 'required|max:255|unique:aplicaciones,URL,'.$data['id'].',idaplicacion',
            'perfil' => 'required|min:1'
        ],$mesanje);
    }

//    funcion para validar el formulario de creacion de aplicaciones
    protected function validator(array $data)
    {
        $mesanje = [
            'icono.dimensions'=>'El tamaño de los iconos debe ser entre 50x50 y 100x100 pixeles'];

        return Validator::make($data, [
            'idapp' => 'required|numeric|min:0|unique:aplicaciones,idaplicacion',
            'nombre' => 'required|max:255|unique:aplicaciones,nombre',
            'icono' => 'required|mimes:jpeg,bmp,png|dimensions:max_width=100,max_height=100,min_width=50,min_height=50',
            'url' => 'required|max:255|unique:aplicaciones,URL',
            'perfil' => 'required|min:1'
        ],$mesanje);
    }

//    funcion que llama al validar
    public function preValidar(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

//    funcion para crear las aplicaciones
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();
            $aplicacion=Aplicaciones::create([
                'idaplicacion'=> $request->idapp,
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
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }


//    funcion para borrar aplicaciones
    public function delete(Request $request){

        $aplicaciones = Aplicaciones::findOrFail($request->id);


        try {
            DB::beginTransaction();

            DB::delete('delete from perfilapp where idaplicacion='.$aplicaciones->idaplicacion);

            $aplicaciones->delete();

            DB::commit();
            $request->session()->flash('success', "Aplicación eliminada con éxito");

            return redirect(route('aplicaciones'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

}
