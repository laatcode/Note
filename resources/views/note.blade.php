@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="principalButtons">
      <a class="btn btn-info mr-3" href="/notebook/{{ $notebookId }}">Regresar</a>
      @if ($mode == 'r')
        <a href="/notebook/{{ $notebookId }}/note/{{ $note['id'] }}/e"><span class="far fa-edit fa-2x"></span></a>
      @else
        <a href="/notebook/{{ $notebookId }}/note/{{ $note['id'] }}/r"><span class="fas fa-eye fa-2x"></span></a>
      @endif
    </div>

    <form action="/notebook/{{ $notebookId }}/updateNote/{{ $note['id'] }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <input class="form-control" type="text" name="title" value="{{$note['title']}}" @if ($mode == 'r') readonly @endif>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="text" rows="8" cols="80" @if ($mode == 'r') readonly @endif>{{ $note['text'] }}</textarea>
      </div>

      @if ($mode == 'e')
        <button class="btn btn-success" type="submit" name="button">Grabar</button>
        <a href="/notebook/{{$notebookId}}"><button class="btn btn-danger" type="button" name="button">Cancelar</button></a>
      @else
        <a href="/notebook/{{$notebookId}}"><button class="btn btn-primary" type="button" name="button">Aceptar</button></a>
      @endif
    </form>
  </div>
@endsection
