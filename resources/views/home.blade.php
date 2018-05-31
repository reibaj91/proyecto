@extends('layouts.inicio')
@section('cuerpo')
    <div id="content">
        @foreach($aplicaciones as $a)
          <span class="ruta" onclick="enlace('{{$a->aplicaciones->URL}}')">
            {{$a->aplicaciones->icono}}
            {{$a->aplicaciones->nombre}}
          </span>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script>
        function enlace(url) {
            location.href="http://"+url;
        }
    </script>

@endsection