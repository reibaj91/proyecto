@extends('auth.app')
<?php $content = \App\User::select('nombre')->get(); ?>
@section('content')

    <div class="container mt-5" style="margin-top:10%;">
        <form method="POST" class="form-signin" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="panel periodic-login">
                <img src="\asset\img\logotipo.png" alt="logotipo evg" style="max-width:100%;">
                <div class="panel-body text-center">
                    <div class="form-group form-animate-text">
                        @if($content=='[]')
                            <div class="text-center" style="padding:5px;">
                                <a class="btn btn-primary" href="{{ route('register') }}">Iniciar</a>
                            </div>
                        @else
                            <div class="text-center" style="padding:5px;">
                                <a href="{{ url('login/google') }}" class="btn btn-google"><i class="fa fa-google"></i>
                                    Google</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

