@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Editar  Curso</h3>
                    <p class="animated fadeInDown">
                        Cursos <span class="fa-angle-right fa"></span> Editar
                    </p>
                </div>
            </div>
        </div>
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
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;"
                 class="alert  {{ Session::get('alert-class', 'alert-success') }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Editar Curso</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('cursos.edit')}}"
                          novalidate="novalidate">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="Curso" name="Curso" required
                                       aria-required="true" value="{{ $curso->idCursoColegio }}">
                                <span class="bar"></span>
                                <label for="Curso">Curso</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nombre" name="nombre" required
                                       aria-required="true" value="{{ $curso->nombre }}">
                                <span class="bar"></span>
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="form-group">
                                <label for="seccion">Etapa</label>
                                <select class="form-control " id="codEtapa" name="codEtapa" required
                                        aria-required="true">
                                    <option value="{{null}}">Seleccione una Etapa</option>
                                    @foreach($etapas as $etapa)
                                        <option value="{{$etapa->codEtapa}}" {{ $curso->codEtapa == $etapa->codEtapa ? 'selected' : ''}}>{{$etapa->nombre}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" value="{{$curso->idCurso}}" name="idCurso">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-danger" onclick="continuar(event)">Editar</button>
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
            $('#codEtapa').select2();
        });
    </script>
@endsection

