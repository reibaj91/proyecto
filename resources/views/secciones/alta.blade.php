@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Secciones</h3>
                    <p class="animated fadeInDown">
                        Sección <span class="fa-angle-right fa"></span> Alta
                    </p>
                </div>
            </div>
        </div>
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;"
                 class="alert  {{ Session::get('alert-class', 'alert-success') }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Añadir Sección</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('secciones.store')}}"
                          novalidate="novalidate">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="seccion" name="seccion" required
                                       aria-required="true" value="{{ old('seccion') }}">
                                <span class="bar"></span>
                                <label for="seccion">Código Sección de Rayuela</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nombre" name="nombre" required
                                       aria-required="true" value="{{ old('nombre') }}">
                                <span class="bar"></span>
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="idSeccionColegio" name="idSeccionColegio" required
                                       aria-required="true" value="{{ old('idSeccionColegio') }}">
                                <span class="bar"></span>
                                <label for="idSeccionColegio">Código Sección del Colegio</label>
                            </div>
                            <div class="form-group">
                                <label for="tutor">Tutor</label>
                                <select class="form-control " id="tutor" name="tutor" required
                                        aria-required="true">
                                    <option value="{{null}}">Seleccione un Tutor</option>
                                    @foreach($tutores as $tutor)
                                        <option value="{{$tutor->idUsuario}}" {{ old('tutor') == $tutor->idUsuario ? 'selected' : ''}}>{{$tutor->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="seccion">Curso</label>
                                <select class="form-control " id="curso" name="curso" required
                                        aria-required="true">
                                    <option value="{{null}}">Seleccione un Curso</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{$curso->idCurso}}" {{ old('curso') == $curso->idCurso ? 'selected' : ''}}>{{$curso->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-danger" onclick="continuar(event)">Crear</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#tutor').select2();
            $('#curso').select2();

        });
    </script>

@endsection


