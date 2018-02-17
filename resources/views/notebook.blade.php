@extends('layouts.app')

@section('content')
  <div class="container">

    <h2 class="title">{{ $notebook['title'] }}</h2>

    <div class="principalButtons">
      <a class="mr-3" href="/notebooks"><button role="button" class="btn btn-info">Mis libretas</button></a>
      <a href="#" data-toggle="modal" data-target="#createModal"><button role="button" class="btn btn-warning">Nueva nota</button></a>
    </div>

    <div class="notesList">
      <ul class="list-group">
        @foreach ($notes as $note)
          <div class="note">
              <div class="col-10 col-lg-10">
                <a class="d-block" href="/notebook/{{ $notebook['id'] }}/note/{{ $note['id'] }}/r">
                  <h3>{{ $note['title'] }}</h3>
                  <p class="m-0">{{ $note['text'] }}</p>
                  <small class="text-muted"><b>Creada el: </b>{{ $note['created_at'] }}</small></br>
                  <small class="text-muted"><b>Modificada el: </b>{{ $note['updated_at'] }}</small>
                </a>
              </div>
              <div class="col-2 col-lg-2 d-flex align-items-center justify-content-around p-0">
                <a href="/notebook/{{ $notebook['id'] }}/note/{{ $note['id'] }}/e"><span class="far fa-edit fa-2x"></span></a>
                <a id="openConfirmDelete" href="#" data-id="{{ $note['id'] }}" data-toggle="modal" data-target="#confirmDelete"><span class="far fa-trash-alt fa-2x"></span></a>
              </div>
          </div>
        @endforeach
      </ul>
    </div>

    @component('templates.createModal')
      @if ($errors->any())
        <div id="error"></div>
      @endif
      @slot('route')
        /notebook/{{ $notebook['id'] }}/createNote
      @endslot

      @slot('title')
        Crear Nota
      @endslot

      <div class="form-group">
        <label for="title" class="required">Título</label>
        <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title') }}" required>
        @if ($errors->has('title'))
          @foreach ($errors->get('title') as $error)
            <div class="invalid-feedback">
              {{ $error }}
            </div>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="text" class="required">Texto de la nota</label>
        <textarea class="form-control @if($errors->has('text')) is-invalid @endif" name="text" rows="10" required>{{ old('text')}}</textarea>
        @if ($errors->has('text'))
          @foreach ($errors->get('text') as $error)
            <div class="invalid-feedback">
              {{ $error }}
            </div>
          @endforeach
        @endif
      </div>
    @endcomponent

    @component('templates.confirmDeleteModal')
      <p class="m-0">¿Está seguro que desea eliminar esta nota?</p>
      @slot('getRoute')
        /notebook/{{ $notebook['id'] }}/deleteNote/
      @endslot
    @endcomponent

  </div>

  <script type="text/javascript">

    let baseRoute;

    $(document).ready(function (){
      baseRoute = $("#getRoute").attr("href");

      if ($("#error").length) {
        $('#createModal').modal();
      }

      $(document).on("click", "#openConfirmDelete", function (){
        $("#getRoute").attr("href", baseRoute + $(this).attr("data-id"));
      });
    });

  </script>
@endsection
