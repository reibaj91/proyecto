<?php

namespace App\Http\Controllers;

use App\Etapas;
use App\Profesores;
use App\ProfesoresPerfiles;
use App\Secciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\User;
use PharIo\Manifest\EmailTest;
use SpreadsheetReader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Rap2hpoutre\FastExcel\FastExcel;

class ProfesoresController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'profesores'], function () {
            Route::get('/', 'ProfesoresController@index')->name('profesores');
            Route::get('alta', 'ProfesoresController@alta')->name('profesores.alta');
            Route::get('importar', 'ProfesoresController@importar')->name('profesores.importar');

            Route::get('editar/{id}', 'ProfesoresController@editar')->name('profesores.editar');
            Route::post('edit', 'ProfesoresController@edit')->name('profesores.edit');

            Route::post('borrar','ProfesoresController@delete')->name('profesores.delete');
            Route::post('import', 'ProfesoresController@import')->name('profesores.import');
            Route::post('store', 'ProfesoresController@store')->name('profesores.store');
            Route::post('pre-validar', 'ProfesoresController@preValidar')->name('profesores.pre-validar');
        });
    }


//    Nos muestra la vista con todos los usuarios
    public function index()
    {
        $profesores = User::all();

        return view('profesores.profesores', compact('profesores'));
    }

//    Nos muestra la vista para importar los usuarios del excel
    public function importar()
    {

        return view('profesores.importar');
    }

//    Nos muestra la vista para editar un usuario
    public function editar($id)
    {
        $user = User::where('idUsuario', $id)->first();

        return view('profesores.editar', [
            'user' => $user
        ]);
    }

//    Funcion para editar usuarios
    public function edit(Request $request){

        $this->validatorEdit($request->all())->validate();

        $user =User::findOrFail($request->id);

        if(!isset($request->baja_temporal)){
            $request->baja_temporal='N';
        }

        try{
            DB::beginTransaction();

            $user->nombre = $request->nombre;
            $user->email = $request->email;
            $user->baja_temporal= $request->baja_temporal;

            $user->save();

            DB::commit();
            Session::flash('message', "Profesor editado con éxito");

            return redirect(route('profesores'));
        } catch (\Exception $e) {
            Session::flash('message', "No se ha podido editar al profesor");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('profesores'));
    }


//    Nos muestra la vista para crear nuevos usuarios
    public function alta()
    {

        return view('profesores.alta');
    }

//    Funcion que nos permite importar los usarios del excel
    public function import(Request $request)
    {
        if($request->file==null){
            Session::flash('message', "Debe seleccionar un archivo");
            DB::rollBack();
            return back()->withInput();
        }

        $file = $request->file('file');

        $request->validate([
            'file' => 'mimes:xlsx',
        ]);

        $profesoresperfiles=ProfesoresPerfiles::where('idPerfil','<>',1);
        if ($profesoresperfiles != "[]") {
            DB::beginTransaction();
            $profesoresperfiles->delete();
            DB::commit();
        }

        $etapas=Etapas::where('coordinador','<>',null)->get();
        if ($etapas != "[]") {
            foreach ($etapas as $etapa)
            {
                DB::beginTransaction();

                $etapa->coordinador = null;

                $etapa->save();

                DB::commit();
            }
        }

        $secciones=Secciones::where('tutor','<>',null)->get();
        if ($secciones != "[]") {
            foreach ($secciones as $seccion)
            {
                DB::beginTransaction();

                $seccion->tutor = null;

                $seccion->save();

                DB::commit();
            }
        }

        $profesores=User::where('idUsuario','<>',1);
        if ($profesores != "[]") {
            DB::beginTransaction();
            $profesores->delete();
            DB::commit();
        }

        $path = $file->path();

        try {
            DB::beginTransaction();
            $users = (new FastExcel)->import($path, function ($line) {

                if ($line['Nombre'] != "") {
                    return User::create([
                        'nombre' => $line['Nombre'],
                        'email' => $line['Correo']
                    ]);
                }
            });
            DB::commit();
            Session::flash('message', "Profesores creados con éxito");

            return redirect(route('profesores'));

        } catch (\Exception $e) {
            Session::flash('message', "No se ha podido importar a los profesores");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('profesores'));
    }


//    Funcion para validar los datos recogidos en el formulario de crear usuarios
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:profesores,nombre',
            'email' => 'email|required|regex:[.+@evg\.es]|unique:profesores,email',
        ]);
    }

//    Funcion que llama al validator de crear usuarios
    public function preValidar(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

//    Funcion para validar los datos recogidos en el formulario de editar usuarios
    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:profesores,nombre,' . $data['id'].',idUsuario',
            'email' => 'email|required|regex:[.+@evg\.es]|unique:profesores,email,' . $data['id'].',idUsuario',
        ]);
    }

//    Funcion que llama al validator de editar usuarios
    public function preValidarEdit(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

//    Funcion para crear nuevos usuarios
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();
            User::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
            ]);

            DB::commit();
            Session::flash('message', "Profesor creado con éxito");

            return redirect(route('profesores.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

//    Funcion para eliminar usuarios
    public function delete(Request $request){

        $user = User::findOrFail($request->id);

        $seccion=Secciones::where('tutor',$user->idUsuario)->get();
        $perfiluser=ProfesoresPerfiles::where('idUsuario',$user->idUsuario)->get();
        $etapas=Etapas::where('coordinador',$user->idUsuario)->get();

        if(count($seccion)!=0 && count($perfiluser)!=0 && count($etapas)!=0){
            return 'sep';
        }

        if(count($seccion)!=0 && count($perfiluser)!=0){
            return 'sp';
        }

        if(count($perfiluser)!=0 && count($etapas)!=0){
            return 'pe';
        }

        if(count($seccion)!=0 && count($etapas)!=0){
            return 'se';
        }

        if(count($seccion)!=0){
            return 's';
        }

        if(count($perfiluser)!=0){
            return 'p';
        }

        if(count($etapas)!=0){
            return 'e';
        }

        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();
            $request->session()->flash('success', "Profesor eliminado con Éxito");

            return redirect(route('profesores'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }

    }

}
