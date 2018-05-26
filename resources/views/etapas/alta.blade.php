@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Etapas</h3>
                    <p class="animated fadeInDown">
                        Etapas <span class="fa-angle-right fa"></span> Alta
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
                <h4>Añadir Etapas</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('etapas.store')}}" novalidate="novalidate">
                       @csrf
                       <div class="col-md-12">
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="codigo" name="codigo" required aria-required="true" value="{{ old('codigo') }} ">
                               <span class="bar"></span>
                               <label for="codigo">Código de Etapa del Colegio</label>
                           </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nombre" name="nombre" required aria-required="true" value="{{ old('nombre') }} ">
                                <span class="bar"></span>
                                <label for="name">Nombre</label>
                            </div>
                           <div class="form-group">
                               <label for="seccion">Coordinador</label>
                               <select class="form-control" id="coordinador" name="coordinador">
                                    <option value="{{null}}">Sin coordinador</option>
                                   @foreach($profesores as $p)
                                       <option value="{{$p->idUsuario}}" {{ old('coordinador') == $p->idUsuario ? 'selected' : '' }}>{{$p->nombre}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="seccion">Etapa a la que pertenece</label>
                               <select class="form-control" id="etapapp" name="etapapp" required aria-required="true">
                                   <option value="{{null}}">Sin etapa principal</option>
                                   @foreach($etapas as $e)
                                       <option value="{{$e->codEtapa}}" {{ old('etapapp') == $e->codEtapa ? 'selected' : '' }}>{{$e->nombre}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="col-md-12">
                            <button class="btn btn-danger">Crear</button>
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
            $('#coordinador').select2();
            $('#etapapp').select2();
        });
    </script>

@endsection

