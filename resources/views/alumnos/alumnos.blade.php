@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        @foreach($alumnos as $alumno)
            {{$alumno->nombreCompleto}}
        @endforeach
    </div>
@endsection

