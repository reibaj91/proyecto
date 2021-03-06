<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Etapas;
use App\Secciones;
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


//    Nos muestra la vista con todos los cursos
    public function index(){
        $cursos = Cursos::all();

        return view('cursos.cursos')->with('cursos',$cursos);
    }

//    Nos muestra la vista para importar los cursos
    public function importar()
    {

        return view('cursos.importar');
    }


//    Funcion para importar los cursos desde el excel
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

        $path = $file->path();

        $secciones=Secciones::where('idCurso','<>',null)->get();
        if ($secciones != "[]") {
            foreach ($secciones as $seccion)
            {
                DB::beginTransaction();

                $seccion->idCurso = null;

                $seccion->save();

                DB::commit();
            }
        }

        $curso=Cursos::all();

        if ($curso!="[]"){
            DB::table('cursos')->delete();
        }

        try {
            DB::beginTransaction();
            (new FastExcel)->import($path, function ($line) {
                if ($line['CodigoColegio'] != "") {
                    return Cursos::create([
                        'codCursoColegio' => $line['CodigoColegio'],
                        'nombre' => $line['Nombre curso'],
                        'codEtapa' => $line['CodEtapa']
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


//    Nos muestra la vista para crear los cursos
    public function crear() {

        $etapas=Etapas::all();

        return view ('cursos.alta')->with('etapas',$etapas);
    }


//    Nos muestra la vista para editar los cursos
    public function editar($id)
    {
        $curso = Cursos::where('idCurso', $id)->first();
        $etapas= Etapas::all();

        return view('cursos.editar', [
            'curso' => $curso,
            'etapas' => $etapas,
        ]);
    }


//    Funcion para la validacion del formulario de editar cursos
    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'Curso' => 'required|max:255|max:8|unique:cursos,codCursoColegio, "'.$data['idCurso'].'" ,idCurso',
            'nombre' => 'required|unique:cursos,nombre, "'.$data['idCurso'].'" ,idCurso',
        ]);
    }

//    Funcion que llama al validator edit
    public function preValidarEdit(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

//    Funcion para editar los cursos
    public function edit(Request $request){


        $this->validatorEdit($request->all())->validate();

        $curso =Cursos::findOrFail($request->idCurso);

        try{
            DB::beginTransaction();

            $curso->codCursoColegio = $request->Curso;
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

//    Validaciones del formulario de crear Cursos
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
            'Curso' => 'required|max:255|max:8|unique:cursos,codCursoColegio',
        ], $mensajes);
    }

//    Funcion que llama al validator
    public function preValidar(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }


//    Funcion para crear los cursos
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();


        try {
            DB::beginTransaction();
            Cursos::create([
                'codCursoColegio' => $request->Curso,
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

//    funcion para borrar cursos
    public function delete(Request $request){

        $curso = Cursos::where('idCurso',$request->id)->first();

        $seccion=Secciones::where('idCurso',$curso->idCurso)->get();

        if(count($seccion)!=0){
            return 's';
        }
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
