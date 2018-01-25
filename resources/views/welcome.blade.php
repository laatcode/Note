@extends('layouts.app')

@section('content')
  <div class="row component-center">
    <div class="jumbotron splash">
      <h1 class="display-4">Note</h1>
      <p class="lead">No permitas escapar ninguna de tus ideas, escríbela rapidamente y mantenas disponibles en todo momento con Note.</p>
      <hr class="my-4">
      @guest
        <p>¿Aún no tienes una cuenta?</p>
        <p class="lead">
          <a class="btn btn-primary" href="{{ route('register') }}">Registrarse</a>
        </p>
      @else
        <p class="lead">
          <a class="btn btn-primary" href="/notebooks">Mis Libretas</a>
        </p>
      @endguest
    </div>
  </div>
@endsection
