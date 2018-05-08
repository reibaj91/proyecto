<?php

namespace App\Http\Controllers;

use App\Profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProfesoresController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'profesores'], function () {
            Route::get('/', 'ProfesoresController@index')->name('profesores');
            Route::get('alta', 'ProfesoresController@alta')->name('profesores.alta');

            Route::post('store', 'ProfesoresController@store')->name('profesores.store');
            Route::post('pre-validar', 'ProfesoresController@preValidar')->name('profesores.pre-validar');
        });
    }

    public function index()
    {
        $profesores = Profesores::all();

        return view('profesores.profesores')->with('profesores', $profesores);
    }

    public function alta()
    {

        return view('profesores.alta');
    }

    protected function validator(array $data)
    {
        $mensajes = [
//            'name.required' => "Debe escribir el nombre del profesor",
//            'email.required' => "Debe introducir el correo del profesor",
//            'email.email' => "El correo debe tener un formato correcto",
//            'email.email' => "El correo debe ser unico",
        ];

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|unique:profesores,email'
        ], $mensajes);
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
                'email' => $request->email,
            ]);

            DB::commit();
            Session::flash('message', "Profesor creado con éxito");

            return redirect( route('profesores.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

}
