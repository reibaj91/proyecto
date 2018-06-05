@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="col-md-12" style="background-color: white">
            <div class="col-md-12 text-center">
                <h2>Bienvenido: {{Auth::user()->nombre}}</h2>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection