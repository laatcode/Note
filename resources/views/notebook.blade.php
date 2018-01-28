@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>{{ $notebook['title'] }}</h2>
      </div>
      <div class="card-body">
        <p class="card-subtitle">{{ $notebook['description'] }}</p>
        <a href="/notebooks"><button role="button" class="btn btn-secundary">Mis libretas</button></a>
        <a href="#" data-toggle="modal" data-target="#modal"><button role="button" class="btn btn-primary">Nueva nota</button></a>
        <ul class="list-group">
          @foreach ($notes as $note)
            <div class="note">
              <a href="/notebook/{{ $notebook['id'] }}/note/{{ $note['id'] }}">
                <h3>{{ $note['title'] }}</h3>
                <p>{{ $note['text'] }}</p>
              </a>
            </div>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="/notebook/{{ $notebook['id'] }}/createNote" method="post">
            {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Crear Nota</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="form-group">
                <label for="title" class="required">Título</label>
                <input type="text" class="form-control" name="title" required>
              </div>
              <div class="form-group">
                <label for="text" class="required">Texto de la nota</label>
                <textarea class="form-control" name="text" rows="10"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Crear</button>
          </div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
