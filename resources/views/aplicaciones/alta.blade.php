@extends('layouts.app')
@section('cuerpo')
     <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Aplicaciones</h3>
                    <p class="animated fadeInDown">
                        Aplicaciones <span class="fa-angle-right fa"></span> Alta
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
                <h4>Añadir Aplicación</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('aplicaciones.store')}}" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                       <div class="col-md-12">
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="idapp" name="idapp" required aria-required="true" value="{{old('idapp')}}">
                               <span class="bar"></span>
                               <label for="idapp">Número Identificación de la Aplicación</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="nombre" name="nombre" required aria-required="true" value="{{old('nombre')}}">
                               <span class="bar"></span>
                               <label for="nombre">Nombre</label>
                           </div>
                           <div class="form-group ">

                               <div class="form-group" >
                                   <label for="icono"><h4>Icono</h4></label>
                                   <input id="icono" type="file" class="form-control" name="icono" required>
                               </div>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="url" name="url" required aria-required="true" value="{{ old ('url')}}">
                               <span class="bar"></span>
                               <label for="url">URL</label>
                           </div>
                           <div class="form-group form-animate-checkbox">
                               <label>Perfiles</label><br>
                               <span class="hidden">{{$i=0}}</span>
                               <table>
                                   <tr>
                                   @foreach($perfiles as $p)
                                       @if($i==4)
                                           </tr>
                                            <tr>
                                               <td><input type="checkbox" class="checkbox" id="perfil" name="perfil[]" value="{{$p->idPerfil}}"><label> {{$p->nombre}}</label></td>
                                           <span class="hidden">{{$i=0}}</span>
                                       @else
                                           <td><input type="checkbox" class="checkbox" id="perfil" name="perfil[]" value="{{$p->idPerfil}}"><label> {{$p->nombre}}</label></td>
                                       @endif
                                       <span class="hidden">{{$i++}}</span>
                                   @endforeach
                                    </tr>
                               </table>
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

