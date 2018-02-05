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
          <a class="dropdown-item" href="notebook/{{ $notebook['id'] }}">{{ $notebook['title'] }}</a>
        @endforeach
      </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="/notebooks/create" method="post">
            {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Crear libreta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="form-group">
                <label for="name" class="required">Nombre</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
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
