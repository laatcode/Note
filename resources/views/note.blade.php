@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="/notebook/{{ $notebookId }}/updateNote/{{ $note['id'] }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <input class="form-control" type="text" name="title" value="{{$note['title']}}" style='width:100%'>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="text" rows="8" cols="80">{{ $note['text'] }}</textarea>
      </div>
      <button class="btn btn-success" type="submit" name="button">Grabar</button>
      <a href="/notebook/{{$notebookId}}"><button class="btn btn-danger" type="button" name="button">Cancelar</button></a>
    </form>
  </div>
@endsection