@extends('auth.app')

@section('content')
        <div class="container" style="margin-top: 8%">
            <div class="panel col-md-8 col-md-offset-2">
                <div class="card panel-heading">
                    <div class="card-header"><h3>Restablecer contraseña</h3></div>

                    <div class="card-body panel-body">
                        <form method="POST"  action="{{ route('password.request') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right"><h4>Email</h4></label>
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right"><h4>Contraseña</h4></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
<strong style="color: red">{{ $errors->first('password') }}</strong>
</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right"><h4>Confirmar contraseña</h4></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Restaurar Contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection