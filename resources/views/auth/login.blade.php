@extends('layouts.app')

@section('content')
<div class="row component-center">
  <div class="col-md-9 col-lg-8 col-xl-6">
    <div class="card">
      <div class="card-header"><b>Ingresar</b></div>

      <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right required">Correo electrónico</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right required">Contraseña</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
              @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 offset-md-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8 offset-md-4 text-right text-md-left">
              <button type="submit" class="btn btn-primary">Ingresar</button>
              <a class="btn btn-link" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
