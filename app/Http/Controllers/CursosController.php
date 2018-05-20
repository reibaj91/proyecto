<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Etapas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CursosController extends Controller
{
    static function routes(){
        Route::group(['prefix'=> 'Cursos'], function (){
            Route::get('/', 'CursosController@index')->name('cursos');
            Route::get('crear', 'CursosController@crear')->name('cursos.crear');
            Route::get('editar/{id}', 'CursosController@editar')->name('cursos.editar');
            Route::get('importar', 'CursosController@importar')->name('cursos.importar');

            Route::post('import', 'CursosController@import')->name('cursos.import');
            Route::post('borrar','CursosController@delete')->name('cursos.delete');
            Route::post('edit', 'CursosController@edit')->name('cursos.edit');

            Route::post('store', 'CursosController@store')->name('cursos.store');
            Route::post('pre-validar', 'CursosController@preValidar')->name('cursos.pre-validar');
        });
    }

    public function index(){
        $cursos = Cursos::all();

        return view('cursos.cursos')->with('cursos',$cursos);
    }

    public function importar()
    {

        return view('cursos.importar');
    }

    public function import(Request $request)
    {


        $file = $request->file('file');

        $request->validate([
            'file' => 'mimes:xlsx',
        ]);

        $path = $file->path();

        $curso=Cursos::all();

        if ($curso!="[]"){
            DB::table('cursos')->delete();
        }


        try {
            DB::beginTransaction();
            (new FastExcel)->import($path, function ($line) {
//                dd($line);
                if ($line['Grupo'] != "") {
                    return Cursos::create([
                        'idCurso' => $line['Grupo'],
                        'nombre' => $line['Curso']
                    ]);
                }
            });
            DB::commit();
            Session::flash('message', "Cursos creados con éxito");

            return redirect(route('cursos'));

        } catch (\Exception $e) {
            Session::flash('message', "No se ha podido importar los cursos");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('cursos'));
    }

    public function crear() {

        $etapas=Etapas::all();

        return view ('cursos.alta')->with('etapas',$etapas);
    }

    public function editar($id)
    {
        $curso = Cursos::where('idCurso', $id)->first();
        $etapas= Etapas::all();

        return view('cursos.editar', [
            'curso' => $curso,
            'etapas' => $etapas,
        ]);
    }

    protected function validatorEdit(array $data)
    {
        $mensajes = [
//            'name.required' => "Debe escribir el nombre del profesor",
//            'email.required' => "Debe introducir el correo del profesor",
//            'email.email' => "El correo debe tener un formato correcto",
//            'email.email' => "El correo debe ser unico",
        ];


        return Validator::make($data, [
            'Curso' => 'required|max:255|unique:cursos,idCurso, "'.$data['idCurso'].'" ,idCurso',
            'nombre' => 'required|unique:cursos,nombre, "'.$data['idCurso'].'" ,idCurso',
        ], $mensajes);
    }

    public function preValidarEdit(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

    public function edit(Request $request){


        $this->validatorEdit($request->all())->validate();

        $curso =Cursos::findOrFail($request->idCurso);

        try{
            DB::beginTransaction();

            $curso->idCurso = $request->Curso;
            $curso->nombre=$request->nombre;
            $curso->codEtapa=$request->codEtapa;
            $curso->save();

            DB::commit();
            Session::flash('message', "Curso editado con éxito");

            return redirect(route('cursos'));
        } catch (\Exception $e) {
            Session::flash('message', "No se ha podido editar el Curso");
            DB::rollBack();

            return back()->withInput();
        }

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
            'nombre' => 'required|max:255|unique:cursos,nombre',
            'Curso' => 'required|max:255|unique:cursos,idCurso',
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
            Cursos::create([
                'idCurso' => $request->Curso,
                'nombre' => $request->nombre,
                'codEtapa' => $request->codEtapa,
            ]);

            DB::commit();
            Session::flash('message', "Curso creado con éxito");

            return redirect( route('cursos.crear'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }


    public function delete(Request $request){

        $curso = Cursos::where('idCurso',$request->id);

        try {
            DB::beginTransaction();

            $curso->delete();

            DB::commit();
            $request->session()->flash('success', "Curso eliminado con Éxito");

            return redirect(route('cursos'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }

    }
}
