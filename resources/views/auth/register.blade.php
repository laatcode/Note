@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row component-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Registrarse</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="names" class="col-md-4 col-form-label text-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="names" type="text" class="form-control{{ $errors->has('names') ? ' is-invalid' : '' }}" name="names" value="{{ old('names') }}" required autofocus>

                                @if ($errors->has('names'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('names') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastnames" class="col-md-4 col-form-label text-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="lastnames" type="text" class="form-control{{ $errors->has('lastnames') ? ' is-invalid' : '' }}" name="lastnames" value="{{ old('lastnames') }}" required autofocus>

                                @if ($errors->has('lastnames'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastnames') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-right">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarme
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
