@extends('layouts.app')

@section('content')
  <div class="container">
    <h5>Seleccione la libreta que desea usar:</h5>
    <div class="dropdown">
      <a class="dropdown-toggle btn btn-info" href="#" id="notebooks" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Libretas <span class="badge badge-light">{{ count( $notebooks ) }}</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="notebooks">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal">Nueva libreta</a>
        @foreach ($notebooks as $notebook)
          <div class="d-flex align-items-center mr-3">
            <a class="dropdown-item" href="notebook/{{ $notebook['id'] }}">{{ $notebook['title'] }}</a>
            <a id="openConfirmDelete" href="#" data-id="{{ $notebook['id'] }}" data-toggle="modal" data-target="#confirmDelete"><span class="far fa-trash-alt fa-lg"></span></a>
          </div>
        @endforeach
      </div>
    </div>

    @component('templates.createModal')
      @slot('route')
        /notebooks/create
      @endslot

      @slot('title')
        Crear Libreta
      @endslot

      <div class="form-group">
        <label for="title" class="required">Nombre</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="form-group">
        <label for="text" class="required">Descripción</label>
        <textarea class="form-control" name="description" rows="5"></textarea>
      </div>
    @endcomponent

    @component('templates.confirmDeleteModal')
      <p class="m-0">¿Está seguro que desea eliminar esta libreta con todas las notas?</p>
      @slot('getRoute')
        /notebooks/deleteNotebook/
      @endslot
    @endcomponent

  </div>
@endsection
