@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Alumnos</h3>
                    <p class="animated fadeInDown">
                        Alumnos <span class="fa-angle-right fa"></span> Alta
                    </p>
                </div>
            </div>
        </div>
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
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;" class="alert  {{ Session::get('alert-class', 'alert-success') }}"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Añadir Alumno</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('alumnos.store')}}" novalidate="novalidate">
                        @csrf
                       <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nia" name="nia" value="{{old('nia')}}" required aria-required="true">
                                <span class="bar"></span>
                                <label for="nia">NIA</label>
                            </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="nombre" {{old('nombre')}} name="nombre" required aria-required="true">
                               <span class="bar"></span>
                               <label for="nombre">Nombre</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" {{old('dni')}} id="dni" name="dni" required aria-required="true">
                               <span class="bar"></span>
                               <label for="dni">DNI</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="date" class="form-text" {{old('feche')}} id="fecha" name="fecha" required aria-required="true">
                               <span class="bar"></span>
                               <label for="fecha">Fecha Nacimiento</label>
                           </div>
                           <label for="sexo"><h4>Sexo</h4></label>
                           <div class="form-animate-radio" style="padding-left:3em;">
                               <label class="radio">
                                   <input id="sexo" type="radio" name="sexo" value="H" checked="checked"/>
                                   <span class="outer"><span class="inner"></span></span> Masculino
                               </label><br>
                               <label class="radio">
                                   <input id="sexo" type="radio" name="sexo" value="M"/>
                                   <span class="outer"><span class="inner"></span></span> Femenino
                               </label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" {{old('telefono')}} id="telefono" name="telefono" required aria-required="true">
                               <span class="bar"></span>
                               <label for="telefono">Telefono</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" {{old('telefono_urgencia')}} id="telefono_urgencia" name="telefono_urgencia" required aria-required="true">
                               <span class="bar"></span>
                               <label for="telefono_urgencia">Telefono Urgencias</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" {{old('email')}} id="email" name="email" required aria-required="true">
                               <span class="bar"></span>
                               <label for="email">Email</label>
                           </div>
                           <div class="form-group">
                               <label for="seccion">Sección</label>
                               <select class="form-control " id="seccion" {{old('seccion')}} name="seccion" required aria-required="true">
                                   <option value="{{null}}">Elige Sección</option>
                                   @foreach($secciones as $s)
                                       <option value="{{$s->idSeccion}}">{{$s->nombre}}</option>
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
@endsection