@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Asignar Gestor</h3>
                    <p class="animated fadeInDown">
                        Gestor <span class="fa-angle-right fa"></span> Crear
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
                <h4>Añadir Gestor</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('gestor.store')}}" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gestor">Gestor</label>
                                <select class="form-control" id="gestor" name="gestor">
                                    <option value="{{null}}" disabled>Seleccione un Usuario</option>
                                    @foreach($profesores as $p)
                                        <option value="{{$p->idUsuario}}" {{ old('coordinador') == $p->idUsuario ? 'selected' : '' }}>{{$p->nombre}}</option>
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
            $('#gestor').select2();
        });
    </script>
@endsection

