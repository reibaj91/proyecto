@extends('layouts.inicio')
@section('cuerpo')
    <div id="content">
        @foreach($aplicaciones as $a)
          <span class="ruta" onclick="enlace('{{$a->aplicaciones->URL}}')">
            <img src="images/aplicaciones/{{$a->aplicaciones->icono}}" style="cursor: pointer"><br>
              <span style="cursor: pointer">{{$a->aplicaciones->nombre}}</span>
          </span><br>
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