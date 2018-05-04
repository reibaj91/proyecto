@extends('auth.app')

@section('content')

    <div class="container mt-5">

        <form method="POST" class="form-signin" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="panel periodic-login">
                <div class="text-center"><h4>Recuperar contraseña</h4></div>

                <div class="panel-body text-center">
                    <label class="pull-left" for="email">Introduce tu email para restablecer tu contraseña</label>
                    <div class="form-group form-animate-text">

                        <input id="email" type="text"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="color: red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <span class="bar"></span>

                    </div>
                    <input type="submit" class="btn btn-primary col-md-12" value="Enviar"/>
                </div>
            </div>
        </form>

    </div>
@endsection