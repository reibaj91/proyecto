@extends('layouts.app')
@section('cuerpo')
    <style>
        html{
            background-color: white;
        }
    </style>
    <div id="content">
        <div class="col-md-12" style="background-color: white">
            <div class="col-md-12 text-center">
                <h2>Bienvenido: {{Auth::user()->nombre}}</h2>
            </div>
            <div class="text-center">
                <img src="/asset/img/index.png">
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection