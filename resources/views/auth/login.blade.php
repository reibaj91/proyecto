@extends('auth.app')

@section('content')

    <div class="container mt-5">
        <form method="POST" class="form-signin" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="panel periodic-login">
                <div class="panel-body text-center">
                    <div class="form-group form-animate-text">
                        <hr>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                                <a href="{{ url('login/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
                            </div>
                        </div>
                        {{--<input id="email" type="text"--}}
                               {{--class="form-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
                               {{--name="email" value="{{ old('email') }}" required>--}}
                        {{--@if ($errors->has('email'))--}}
                            {{--<span class="invalid-feedback">--}}
                            {{--<strong style="color: red; text-align: right;">{{ $errors->first('email') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        {{--<span class="bar"></span>--}}
                        {{--<label>Email</label>--}}
                    </div>
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        {{--<input id="password" type="password"--}}
                               {{--class="form-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"--}}
                               {{--name="password" required>--}}
                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        {{--<span class="bar"></span>--}}
                        {{--<label>Contraseña</label>--}}
                    </div>
                    {{--<label class="pull-left">--}}
                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar--}}
                        {{--contraseña--}}
                    {{--</label>--}}
                    {{--<input type="submit" class="btn btn-primary col-md-12" value="Acceder"/>--}}
                </div>
                {{--<div class="text-center" style="padding:5px;">--}}
                    {{--<a href="{{ route('password.request') }}">Olvidé mi contraseña </a>--}}
                {{--</div>--}}

            </div>
        </form>

    </div>

@endsection
