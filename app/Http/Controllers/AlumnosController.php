<?php

namespace App\Http\Controllers;

use App\Secciones;
use App\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\User;
use SpreadsheetReader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Rap2hpoutre\FastExcel\FastExcel;

class AlumnosController extends Controller
{
    static function routes()
    {
        Route::group(['prefix' => 'alumnos'], function () {
            Route::get('/', 'AlumnosController@index')->name('alumnos');
            Route::get('nuevo', 'AlumnosController@nuevo')->name('alumnos.nuevo');
            Route::get('importar', 'AlumnosController@importar')->name('alumnos.importar');
            Route::get('importar-parcial', 'AlumnosController@importarparcial')->name('alumnos.importarparcial');
            Route::get('editar/{id}', 'AlumnosController@editar')->name('alumnos.editar')->where('id', '[0-9]+');
            Route::post('edit', 'AlumnosController@edit')->name('alumnos.edit');

            Route::post('borrar', 'AlumnosController@delete')->name('alumnos.delete');
            Route::post('importar', 'AlumnosController@importTotal')->name('alumnos.import');
            Route::post('importar-parcial', 'AlumnosController@importParcial')->name('alumnos.importparcial');

            Route::post('store', 'AlumnosController@store')->name('alumnos.store');
            Route::post('pre-validar', 'AlumnosController@preValidar')->name('alumnos.pre-validar');
        });
    }

    //Nos muestra la vista con el listado de todos los alumnos para poder editar y borrar
    public function index()
    {
        $alumnos = Alumnos::all();

        return view('alumnos.alumnos', compact('alumnos'));
    }

//    Vista para importar alumnos
    public function importar()
    {

        return view('alumnos.importar');
    }

//    Vista para la importación parcial
    public function importarparcial()
    {

        return view('alumnos.importarparcial');
    }

//    Vista para crear un nuevo alumno, nos cargará todas las secciones
    public function nuevo()
    {
        $secciones = Secciones::all();

        return view('alumnos.alta')->with('secciones', $secciones);
    }

//    Vista para editar los datos de un alumno concreto
    public function editar($id)
    {
        $alumnos = Alumnos::where('nia', $id)->first();
        $secciones = Secciones::all();
        return view('alumnos.editar', [
            'alumnos' => $alumnos,
            'secciones' => $secciones,
        ]);
    }

//    Funcion para editar los datos de un alumno
    public function edit(Request $request)
    {
        $this->validatorEdit($request->all())->validate();
        $alumnos = Alumnos::findOrFail($request->id);

        try {
            DB::beginTransaction();

            $alumnos->nia = $request->nia;
            $alumnos->nombreCompleto = $request->nombre;
            $alumnos->dni = $request->dni;
            $alumnos->fechaNacimiento = $request->fecha;
            $alumnos->sexo = $request->sexo;
            $alumnos->telefono = $request->telefono;
            $alumnos->telefono_urgencia = $request->telefono_urgencia;
            $alumnos->email = $request->email;
            $alumnos->idSeccion = $request->seccion;

            $alumnos->save();

            DB::commit();
            Session::flash('message', "Alumno editado con éxito");

            return redirect(route('alumnos'));
        } catch (\Exception $e) {

            Session::flash('message', "No se ha podido editar al alumno");
            DB::rollBack();
            return back()->withInput();
        }

        return redirect(route('alumnos'));
    }


//    funcion para la importación completa de todos los alumnos desde un xlsx
    public function importTotal(Request $request)
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

        $secciones= Secciones::all();

        if($secciones=='[]'){
            Session::flash('message', "Debe importar primero las secciones");
            DB::rollBack();

            return back()->withInput();
        }

        $path = $file->path();

        $alumnos = Alumnos::all();

        if ($alumnos != "[]") {
            DB::table('alumnos')->delete();
        }

        try {
            DB::beginTransaction();
            $alumnos = (new FastExcel)->import($path, function ($line) {
                if ($line['Alumno'] != "") {
                    if ($line['Estado Matrícula'] != 'Obtiene Título' ||
                        $line['Estado Matrícula'] != 'Anulada' ||
                        $line['Estado Matrícula'] != 'Trasladada') {
                        return Alumnos::create([
                            'nombreCompleto' => $line['Alumno'],
                            'nia' => $line['Nº Id. Escolar'],
                            'dni' => $line['DNI/Pasaporte'],
                            'fechaNacimiento' => ($line['Fecha de nacimiento'])->format('Y-m-d'),
                            'telefono' => $line['Teléfono'],
                            'telefono_urgencia' => $line['Teléfono de urgencia'],
                            'email' => $line['Correo electrónico'],
                            'idSeccion' => $line['Grupo'],
                            'sexo' => $line['Sexo'],
                        ]);
                    }
                }
            });
            DB::commit();
            Session::flash('message', "Alumnos creados con éxito");

            return redirect(route('alumnos'));

        } catch (\Exception $e) {
            dd($e);
            Session::flash('message', "No se ha podido importar a los alumnos");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('alumnos'));
    }


//    funcion para la importacion de determinados alumnos y borrando otros
    public function importParcial(Request $request)
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


        try {
            DB::beginTransaction();
            $alumnos = (new FastExcel)->import($path, function ($line) {
                if ($line['Alumno'] != "") {

                    $alumno=Alumnos::where('nia','=',$line['Nº Id. Escolar'])->first();
                     if ($alumno!=null && ($line['Estado Matrícula'] == 'Obtiene Título' ||
                        $line['Estado Matrícula'] == 'Anulada' ||
                        $line['Estado Matrícula'] == 'Trasladada')) {
                         $alumno->delete();
                     }elseif ($alumno==null && ($line['Estado Matrícula'] != 'Obtiene Título' &&
                         $line['Estado Matrícula'] != 'Anulada' &&
                         $line['Estado Matrícula'] != 'Trasladada')) {
                         return Alumnos::create([
                             'nombreCompleto' => $line['Alumno'],
                             'nia' => $line['Nº Id. Escolar'],
                             'dni' => $line['DNI/Pasaporte'],
                             'fechaNacimiento' => ($line['Fecha de nacimiento'])->format('Y-m-d'),
                             'telefono' => $line['Teléfono'],
                             'telefono_urgencia' => $line['Teléfono de urgencia'],
                             'email' => $line['Correo electrónico'],
                             'idSeccion' => $line['Grupo'],
                             'sexo' => $line['Sexo'],
                         ]);
                     }

                    }
            });
            DB::commit();
            Session::flash('message', "Alumnos creados con éxito");

            return redirect(route('alumnos'));

        } catch (\Exception $e) {
            Session::flash('message', "No se ha podido importar a los alumnos");
            DB::rollBack();

            return back()->withInput();
        }

        return redirect(route('alumnos'));
    }

//    funcion para validar los datos que llegan del formulario de alta del alumno
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nia' => 'required|numeric|unique:alumnos,nia',
            'nombre' => 'required|max:255',
            'dni' => 'nullable|max:9|unique:alumnos,dni',
            'fecha' => 'required|date',
            'telefono' => 'required|numeric',
            'telefono_urgencia' => 'nullable|numeric',
            'email' => 'email|required|unique:alumnos,email',
            'seccion' => 'required|max:7',
        ]);
    }

    //    funcion para validar los datos que llegan del formulario de edición del alumno
    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nia' => 'required|numeric|unique:alumnos,nia,"'. $data['id'].'",nia',
            'nombre' => 'required|max:255',
            'dni' => 'required|max:9|unique:alumnos,dni,"'. $data['id'].'",nia',
            'fecha' => 'required|date',
            'telefono' => 'required|numeric',
            'telefono_urgencia' => 'nullable|numeric',
            'email' => 'email|required|unique:alumnos,email,"'. $data['id'].'",nia',
            'seccion' => 'required|max:7',
        ]);
    }

    //funcion que llama a la funcion de validación
    public function preValidar(Request $request)
    {
        $this->validator($request->all())->validate();

        return response("Válido", 200);
    }


    //funcion para crear los nuevos alumnos
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();
            Alumnos::create([
                'nia' => $request->nia,
                'nombreCompleto' => $request->nombre,
                'dni' => $request->dni,
                'fechaNacimiento' => $request->fecha,
                'sexo' => $request->sexo,
                'telefono' => $request->telefono,
                'telefono_urgencia' => $request->telefono_urgencia,
                'email' => $request->email,
                'idSeccion' => $request->seccion,
            ]);

            DB::commit();
            Session::flash('message', "Alumno creado con éxito");

            return redirect(route('alumnos.alta'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }


//    funcion que borra al alumno seleccionado desde el listado
    public function delete(Request $request){

        $alumnos = Alumnos::findOrFail($request->id);

        try {
            DB::beginTransaction();

            $alumnos->delete();

            DB::commit();
            $request->session()->flash('success', "Alumno eliminado con éxito");

            return redirect(route('alumnos'));

        } catch (\Exception $e) {
            $request->session()->flash('error', "Error al realizar la operación" . $e->getMessage());
            DB::rollBack();
            return back()->withInput();
        }

    }
}
