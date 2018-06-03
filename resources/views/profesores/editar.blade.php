@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Editar Profesores</h3>
                    <p class="animated fadeInDown">
                        Profesores <span class="fa-angle-right fa"></span> Editar
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
                <h4>Editar Profesor</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('profesores.edit')}}" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nombre" name="nombre" required aria-required="true" value="{{ $user->nombre }}">
                                <span class="bar"></span>
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="email" name="email" required aria-required="true" value="{{ $user->email }}">
                                <span class="bar"></span>
                                <label for="email">Email</label>
                                <input type="hidden" name="id" value="{{$user->idUsuario}}">
                            </div>
                            <div class="form-group form-animate-checkbox" style="margin-top:40px !important;">
                                <label for="baja_temporal">Situación</label><br>
                                <input type="checkbox" class="checkbox" id="baja_temporal" name="baja_temporal" value="S" {{ $user->baja_temporal=='S' ? 'checked' : '' }}><label>Baja temporal</label></td>
                                <span class="bar"></span>
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
@endsection

