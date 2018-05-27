<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\ProfesoresPerfiles;
use App\Secciones;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SeccionesController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'Secciones'], function () {
            Route::get('/', 'SeccionesController@index')->name('secciones');
            Route::get('crear', 'SeccionesController@crear')->name('secciones.crear');
            Route::get('editar/{id}', 'SeccionesController@editar')->name('secciones.editar');
            Route::get('importar', 'SeccionesController@importar')->name('secciones.importar');

            Route::post('import', 'SeccionesController@import')->name('secciones.import');
            Route::post('borrar', 'SeccionesController@delete')->name('secciones.delete');
            Route::post('edit', 'SeccionesController@edit')->name('secciones.edit');

            Route::post('store', 'SeccionesController@store')->name('secciones.store');
            Route::post('pre-validar', 'SeccionesController@preValidar')->name('secciones.pre-validar');
        });
    }

    public function index()
    {
        $secciones = Secciones::all();

        return view('secciones.secciones')->with('secciones', $secciones);
    }

    public function importar()
    {

        return view('secciones.importar');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        $request->validate([
            'file' => 'mimes:xlsx',
        ]);

        $path = $file->path();

        $secciones = Secciones::all();

        if ($secciones != "[]") {
            DB::table('secciones')->delete();
        }


        try {
            DB::beginTransaction();
            (new FastExcel)->import($path, function ($line) {
                if ($line['Grupo'] != "") {
                    return Secciones::create([
                        'idSeccion' => $line['Grupo'],
                        'nombre' => $line['Sección'],
                        'idSeccionColegio' => $line['Codigo Colegio'],
                    ]);
                }
            });
            DB::commit();
            Session::flash('message', "Secciones creadas con éxito");

            return redirect(route('secciones'));

        } catch (\Exception $e) {
            dd($e);
            Session::flash('message', "No se ha podido importar las secciones");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('secciones'));
    }



    public function crear()
    {
        $cursos = Cursos::all();
        $tutores = DB::table('profesores')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('profesores_perfiles')
                    ->whereRaw('profesores.idUsuario = profesores_perfiles.idUsuario')
                    ->where('idPerfil', '=', 2);
            })
            ->get();

        return view('secciones.alta', [
            'cursos' => $cursos,
            'tutores' => $tutores
        ]);
    }



    public function editar($id)
    {
        $secciones = Secciones::where('idSeccion', $id)->first();
        $cursos = Cursos::all();
        $tutores = DB::table('profesores')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('profesores_perfiles')
                    ->whereRaw('profesores.idUsuario = profesores_perfiles.idUsuario')
                    ->where('idPerfil', '=', 2);
            })
            ->get();

        return view('secciones.editar', [
            'cursos' => $cursos,
            'secciones' => $secciones,
            'tutores' => $tutores
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
            'seccion' => 'required|max:255|unique:secciones,idSeccion, "'.$data['idSeccion'].'" ,idSeccion',
            'nombre' => 'required|unique:secciones,nombre, "'.$data['idSeccion'].'" ,idSeccion',
        ], $mensajes);
    }



    public function preValidarEdit(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }

    public function edit(Request $request)
    {

        $this->validatorEdit($request->all())->validate();

        $seccion = Secciones::findOrFail($request->idSeccion);
        $tutor=$seccion->tutor;
        try {
            DB::beginTransaction();

            $seccion->idSeccion = $request->seccion;
            $seccion->nombre = $request->nombre;
            $seccion->idSeccionColegio = $request->idSeccionColegio;
            $seccion->tutor = $request->tutor;
            $seccion->idCurso = $request->curso;
            $seccion->save();


            if($tutor != $request->tutor)
            {
                $deleted = DB::delete('delete from profesores_perfiles where idUsuario='.$tutor.' and idPerfil=2');

                if ($request->tutor!=null)
                {
                    ProfesoresPerfiles::create([
                        'idUsuario' => $request->tutor,
                        'idPerfil' => 2,
                    ]);
                }
            }

            DB::commit();
            Session::flash('message', "Sección editada con éxito");

            return redirect(route('secciones'));
        } catch (\Exception $e) {
            Session::flash('message', "No se ha podido editar la Seccion");
            DB::rollBack();

            return back()->withInput();
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255|unique:secciones,nombre',
            'seccion' => 'required|max:7|unique:secciones,idSeccion',
            'idSeccionColegio' => 'nullable|max:8|unique:secciones,idSeccionColegio',
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
            $seccion = Secciones::create([
                'idSeccion' => $request->seccion,
                'nombre' => $request->nombre,
                'idSeccionColegio' => $request->idSeccionColegio,
                'tutor' => $request->tutor,
                'idCurso' => $request->curso,
            ]);


            if ($request->tutor)
            {
                ProfesoresPerfiles::create([
                    'idUsuario' => $request->tutor,
                    'idPerfil' => 2
                ]);
            }


            DB::commit();
            Session::flash('message', "Sección creada con éxito");

            return redirect(route('secciones.crear'));

        } catch (\Exception $e) {
//            if ($request->tutor==null){
//                Session::flash('error', "Falta el campo tutor");
//                return back()->withInput();
//            }
//            if($request->curso==null){
//                Session::flash('error', "Falta el campo curso");
//                return back()->withInput();
//            }
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }


    public function delete(Request $request)
    {

        $seccion = Secciones::where('idSeccion', $request->id);

        try {
            DB::beginTransaction();

            $seccion->delete();

            DB::commit();
            $request->session()->flash('success', "Seccion eliminada con Éxito");

            return redirect(route('secciones'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }

    }
}
