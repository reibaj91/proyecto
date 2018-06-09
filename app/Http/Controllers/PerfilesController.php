<?php

namespace App\Http\Controllers;

use App\PerfilApp;
use App\Perfiles;
use App\ProfesoresPerfiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use SpreadsheetReader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Rap2hpoutre\FastExcel\FastExcel;

class PerfilesController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Perfiles'], function (){
            Route::get('/', 'PerfilesController@index')->name('perfiles');
            Route::get('nuevo', 'PerfilesController@nuevo')->name('perfiles.nuevo');
            Route::get('editar/{id}', 'PerfilesController@editar')->name('perfiles.editar')->where('id', '[0-9]+');
            Route::post('edit', 'PerfilesController@edit')->name('perfiles.edit');

            Route::post('borrar', 'PerfilesController@delete')->name('perfiles.delete');

            Route::post('store', 'PerfilesController@store')->name('perfiles.store');
            Route::post('pre-validar', 'PerfilesController@preValidar')->name('perfiles.pre-validar');


            Route::post('asignar', 'PerfilesController@asignar')->name('perfiles.asignar-usuario');
            Route::post('lista', 'PerfilesController@lista')->name('perfiles.lista');

            Route::post('borrarPefil', 'PerfilesController@borrarPefil')->name('perfiles.borrarPefil');

            Route::get('asignarPerfil','PerfilesController@asignarPerfiles')->name('perfiles.asignar');
        });
    }

    public function index(){
        $perfiles = Perfiles::all();

        return view('perfiles.perfiles')->with('perfiles',$perfiles);
    }

    public function nuevo()
    {

        return view('perfiles.alta');
    }

    public function editar($id)
    {
        $perfiles = Perfiles::where('idPerfil', $id)->first();
        return view('perfiles.editar', [
            'perfiles' => $perfiles,
        ]);
    }

    public function edit(Request $request)
    {

        $this->validatorEdit($request->all())->validate();
        $perfiles = Perfiles::findOrFail($request->id);


        try {
            DB::beginTransaction();

            $perfiles->idPerfil = $request->id;
            $perfiles->nombre = $request->nombre;

            $perfiles->save();

            DB::commit();
            Session::flash('message', "Perfil editado con éxito");

            return redirect(route('perfiles'));
        } catch (\Exception $e) {

            Session::flash('message', "No se ha podido editar el perfil");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('perfiles'));
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
            Perfiles::create([
                'idPerfil' => $request->idperfil,
                'nombre' => $request->nombre,

            ]);

            DB::commit();
            Session::flash('message', "Perfil creado con éxito");

            return redirect( route('perfiles.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [#validacion del alta
            'idperfil' => 'required|numeric|min:1|unique:perfiles,idPerfil',
            'nombre' => 'required|max:25|unique:perfiles,nombre',
        ]);
    }


    protected function validatorEdit(array $data)
    {

        return Validator::make($data, [
            'nombre' => 'required|max:25|unique:perfiles,idPerfil,"'. $data['id'].'",idPerfil',
        ]);
    }

    public function delete(Request $request){

        if($request->id ==1 || $request->id ==2 || $request->id ==3 || $request->id ==4 || $request->id ==5 || $request->id ==6){
            $request->session()->flash('warning', "Este perfil no se puede eliminar");

            return redirect(route('perfiles'));
        }

        $perfiles = Perfiles::where('idPerfil','=',$request->id)->first();

        $proper=ProfesoresPerfiles::where('idPerfil',$perfiles->idPerfil)->get();
        $perfilapp=PerfilApp::where('idPerfil',$perfiles->idPerfil)->get();

        if(count($proper)!=0 && count($perfilapp)!=0){
            return 'ppa';
        }

        if(count($proper)!=0){
            return 'pp';
        }

        if(count($perfilapp)!=0){
            return 'pa';
        }

        try {
            DB::beginTransaction();

            $perfiles->delete();

            DB::commit();
            $request->session()->flash('success', "Perfil eliminado con éxito");

            return redirect(route('perfiles'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }

    }

    public function asignarPerfiles(){

        $perfiles=Perfiles::whereNotIn('idPerfil',[1,2,3])->get();
        $profesores=User::noAdministrador()->get();


        return view('profesores-perfiles.asignar',[
            'perfiles' => $perfiles,
            'profesores' => $profesores,
        ]);

    }

    public function lista(){
        $profesorPerfil=ProfesoresPerfiles::with('profesores')->with('perfiles')->whereNotIn('idPerfil',[1,2,3])->get();

        return view('profesores-perfiles.tabla-perfiles-profesores',[
            'profesorPerfil' => $profesorPerfil
        ]);

    }

    public function asignar(Request $request){

        $existe=ProfesoresPerfiles::where('idUsuario',$request->usuario)->where('idPerfil',$request->perfil)->first();

        if($existe!=null){
            return 'existe';
        }

        try {
            DB::beginTransaction();
            ProfesoresPerfiles::create([
                'idUsuario' => $request->usuario,
                'idPerfil' => $request->perfil,

            ]);

            DB::commit();


        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput();
        }

    }

    public function borrarPefil(Request $request){


        DB::delete('delete from perfiles_profesor where idUsuario='.$request->idUsuario.' and idPerfil='.$request->idPerfil);


    }

}
