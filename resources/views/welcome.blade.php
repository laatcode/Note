@extends('layouts.app')

@section('content')
  <div class="row component-center">
    <div class="jumbotron splash">
      <h1 class="display-4 damion">Notes</h1>
      <p class="paragraph">No permitas que se escape ninguna de tus ideas, escríbela rapidamente y consúltalas en todo momento con Notes.</p>
      <hr class="my-4">
      @guest
        <p class="paragraph">¿Aún no tienes una cuenta?</p>
        <a class="btn btn-primary" href="{{ route('register') }}">Crear cuenta</a>
      @else
        <a class="btn btn-primary" href="/notebooks">Mis Libretas</a>
      @endguest
    </div>
  </div>
@endsection
