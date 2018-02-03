@extends('layouts.app')

@section('content')
<div class="row component-center">
    <div class="col-md-9 col-lg-8 col-xl-6">
        <div class="card">
            <div class="card-header"><b>Cambiar Contraseña</b></div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right required">Correo electrónico</label>
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
                        <div class="col-md-6 offset-md-4 text-right text-md-left">
                            <button type="submit" class="btn btn-primary">Cambiar la contraseña</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
