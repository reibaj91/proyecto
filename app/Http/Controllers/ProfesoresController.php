<?php

namespace App\Http\Controllers;

use App\Profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\User;
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

            Route::get('editar/{id}', 'ProfesoresController@editar')->name('profesores.editar')->where('id','[0-9]+');
            Route::post('edit', 'ProfesoresController@edit')->name('profesores.edit');

            Route::post('borrar','ProfesoresController@delete')->name('profesores.delete');
            Route::post('import', 'ProfesoresController@import')->name('profesores.import');
            Route::post('store', 'ProfesoresController@store')->name('profesores.store');
            Route::post('pre-validar', 'ProfesoresController@preValidar')->name('profesores.pre-validar');
        });
    }


    public function index()
    {
        $profesores = User::all();

        return view('profesores.profesores', compact('profesores'));
    }

    public function importar()
    {

        return view('profesores.importar');
    }

    public function editar($id)
    {
        $user = User::where('idUsuario', $id)->first();

        return view('profesores.editar', [
            'user' => $user
        ]);
    }

    public function edit(Request $request){

        $this->validatorEdit($request->all())->validate();

        $user =User::findOrFail($request->id);


        try{
            DB::beginTransaction();

            $user->nombre = $request->nombre;
            $user->email=$request->email;

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


    public function alta()
    {

        return view('profesores.alta');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        $request->validate([
            'file' => 'mimes:xlsx',
        ]);

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


    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:profesores,nombre',
            'email' => 'email|required|regex:[.+@evg\.es]|unique:profesores,email',
        ]);
    }

    public function preValidar(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:profesores,nombre,' . $data['id'].',idUsuario',
            'email' => 'email|required|unique:profesores,email,' . $data['id'].',idUsuario',
        ]);
    }

    public function preValidarEdit(Request $request)
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

    public function delete(Request $request){

        $user = User::findOrFail($request->id);

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
