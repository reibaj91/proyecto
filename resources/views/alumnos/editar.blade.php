@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Editar Alumnos</h3>
                    <p class="animated fadeInDown">
                        Alumnos <span class="fa-angle-right fa"></span> Editar
                    </p>
                </div>
            </div>
        </div>
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;" class="alert  {{ Session::get('alert-class', 'alert-success') }}"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Editar Alumno</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('alumnos.edit')}}" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nia" name="nia" required aria-required="true" value="{{$alumnos->nia}}">
                                <span class="bar"></span>
                                <label for="nia">NIA</label>
                                <input type="hidden" name="id" value="{{$alumnos->nia}}">
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nombre" name="nombre" required aria-required="true" value="{{$alumnos->nombreCompleto}}">
                                <span class="bar"></span>
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="dni" name="dni" required aria-required="true" value="{{$alumnos->dni}}">
                                <span class="bar"></span>
                                <label for="dni">DNI</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="date" class="form-text" id="fecha" name="fecha" required aria-required="true" value="{{date('Y-m-d', strtotime($alumnos->fechaNacimiento))}}">
                                <span class="bar"></span>
                                <label for="fecha">Fecha Nacimiento</label>
                            </div>
                            <label for="sexo"><h4>Sexo</h4></label>
                            <div class="form-animate-radio" style="padding-left:3em;">
                                <label class="radio">
                                    <input id="sexo" type="radio" name="sexo" value="H" {{  $alumnos->sexo == 'H' ? 'checked' : '' }}/>
                                    <span class="outer"><span class="inner"></span></span> Masculino
                                </label><br>
                                <label class="radio">
                                    <input id="sexo" type="radio" name="sexo" value="M" {{  $alumnos->sexo == 'M' ? 'checked' : '' }}/>
                                    <span class="outer"><span class="inner"></span></span> Femenino
                                </label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="telefono" name="telefono" required aria-required="true" value="{{$alumnos->telefono}}">
                                <span class="bar"></span>
                                <label for="telefono">Telefono</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="telefono_urgencia" name="telefono_urgencia" required aria-required="true" value="{{$alumnos->telefono_urgencia}}">
                                <span class="bar"></span>
                                <label for="telefono_urgencia">Telefono Urgencias</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="email" name="email" required aria-required="true" value="{{$alumnos->email}}">
                                <span class="bar"></span>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <label for="seccion">Sección</label>
                                <select class="form-control " id="seccion" name="seccion" required aria-required="true" >
                                    <option value="{{null}}">Elige Seccion</option>
                                    @foreach($secciones as $s)
                                        <option value="{{$s->idSeccion}}" {{ $s->idSeccion == $alumnos->idSeccion ? 'selected' : '' }}>{{$s->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-danger">Editar</button>
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
            $('#seccion').select2();
        });
    </script>
@endsection

