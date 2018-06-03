<?php

namespace App\Http\Controllers;

use App\ProfesoresPerfiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProfesoresPerfilesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'gestor'], function (){
            Route::get('asignar', 'ProfesoresPerfilesController@asignar')->name('gestor.asignar');
            Route::post('eliminar', 'ProfesoresPerfilesController@eliminar')->name('gestor.eliminar');
            Route::post('store', 'ProfesoresPerfilesController@store')->name('gestor.store');
        });
    }

    public function asignar(){
        $profesores = User::administrador()->get();


        return view('profesores-perfiles.asignar',[
            'profesores' => $profesores
        ]);
    }

    public function eliminar(){
        $profesores = ProfesoresPerfiles::where('idPerfil',4)->first();


        try {
            DB::beginTransaction();

            $deleted = DB::delete('delete from profesores_perfiles where idPerfil=4');

            DB::commit();
            Session::flash('message', "Gestor eliminado con éxito");

            return redirect(route('gestion'));


        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput();
        }

    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $seccion = ProfesoresPerfiles::create([
                'idUsuario' => $request->gestor,
                'idPerfil' => 4,
            ]);


            DB::commit();
            Session::flash('message', "Gestor creado con éxito");

            return redirect(route('gestion'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

}
