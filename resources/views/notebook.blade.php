@extends('layouts.app')

@section('content')
  <div class="container">

    <h2 class="title">{{ $notebook['title'] }}</h2>

    <div class="principalButtons">
      <a href="/notebooks"><button role="button" class="btn btn-secundary">Mis libretas</button></a>
      <a href="#" data-toggle="modal" data-target="#modal"><button role="button" class="btn btn-primary">Nueva nota</button></a>
    </div>

    <div class="notesList">
      <ul class="list-group">
        @foreach ($notes as $note)
          <div class="note">
              <div class="col-10 col-lg-11">
                <a class="d-block" href="/notebook/{{ $notebook['id'] }}/note/{{ $note['id'] }}">
                  <h3>{{ $note['title'] }}</h3>
                  <p class="m-0">{{ $note['text'] }}</p>
                  <small class="text-muted"><b>Creada el: </b>{{ $note['created_at'] }}</small></br>
                  <small class="text-muted"><b>Modificada el: </b>{{ $note['updated_at'] }}</small>
                </a>
              </div>
              <div class="col-2 col-lg-1 d-flex align-items-center justify-content-around">
                <a href="#"><span class="far fa-edit fa-lg"></span></a>
                <a href="#" data-toggle="modal" data-target="#confirmDelete"><span class="far fa-trash-alt fa-lg"></span></a>
              </div>
          </div>
        @endforeach
      </ul>
    </div>

    @component('templates.createModal')
      @slot('route')
        /notebook/{{ $notebook['id'] }}/createNote
      @endslot

      @slot('title')
        Crear Nota
      @endslot

      <div class="form-group">
        <label for="title" class="required">Título</label>
        <input type="text" class="form-control" name="title" required>
      </div>
      <div class="form-group">
        <label for="text" class="required">Texto de la nota</label>
        <textarea class="form-control" name="text" rows="10"></textarea>
      </div>
    @endcomponent

    @component('templates.confirmDeleteModal')
      <p class="m-0">¿Está seguro que desea eliminar esta nota?</p>
      @slot('getRoute')
        /notebook/{{ $notebook['id'] }}/deleteNote/{{ $note['id'] }}
      @endslot
    @endcomponent

  </div>
@endsection
