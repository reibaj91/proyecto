@extends('layouts.inicio')
@section('cuerpo')
    <div id="content" style="padding-left: 0;">
        <div class="col-md-12" style="background-color: white">
            <div class="col-md-12 text-center">
                <h2>Bienvenido: {{Auth::user()->nombre}}</h2><br>
                <h4>Seleccione una aplicación</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12 text-center">
                        @foreach($aplicaciones as $a)
                            <div  style="display: inline-block; margin: 50px 15px 0 15px;">
                                <span class="ruta" onclick="enlace('{{$a->aplicaciones->URL}}')">
                                     <img src="images/aplicaciones/{{$a->aplicaciones->icono}}" style="cursor: pointer"><br>
                                     <span style="cursor: pointer"><strong>{{$a->aplicaciones->nombre}}</strong></span>
                                </span>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function enlace(url) {
            location.href = "http://" + url;
        }
    </script>

@endsection