@extends('layouts.app')

@section('content')
  <div class="row component-center">
    <div class="jumbotron splash">
      <h1 class="display-4">To Do List</h1>
      <p class="lead">Organiza tu día, crea tareas y/o notas con notificaciones en tiempo real para estar organizar mejor tu vida.</p>
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
