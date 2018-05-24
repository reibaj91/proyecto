@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Perfiles</h3>
                    <p class="animated fadeInDown">
                        Perfiles <span class="fa-angle-right fa"></span> Alta
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
                <h4>Añadir Perfil</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('perfiles.store')}}" novalidate="novalidate">
                        @csrf
                       <div class="col-md-12">
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="idperfil" name="idperfil" required aria-required="true">
                               <span class="bar"></span>
                               <label for="idperfil">Número Identificación del Perfil</label>
                           </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nombre" name="nombre" required aria-required="true">
                                <span class="bar"></span>
                                <label for="nombre">Nombre</label>
                            </div>
                       </div>
                        <div class="col-md-12">
                            <button class="btn btn-danger" onclick="continuar(event)">Crear</button>
                            <a href="{{route('perfiles')}}" class="btn btn-warning">Volver</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection

