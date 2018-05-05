@extends('layouts.app')
@section('cuerpo')
    <div id="content">

            <div class="col-mt-5"><h1>Bienvenido {{Auth::user()->nombre}}</h1></div>

    </div>
@endsection

