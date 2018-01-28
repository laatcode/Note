@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="/notebook/{{ $notebookId }}/updateNote/{{ $note['id'] }}" method="post">
      {{ csrf_field() }}
      <div class="row">
        <h2 style='width:100%'><input type="text" name="title" value="{{$note['title']}}" style='width:100%'></h2>
      </div>
      <div class="row">
        <textarea name="text" rows="8" cols="80">{{ $note['text'] }}</textarea>
      </div>
      <button class="btn btn-success" type="submit" name="button">Grabar</button>
      <a href="/notebook/{{$notebookId}}"><button class="btn btn-danger" type="button" name="button">Cancelar</button></a>
    </form>
  </div>
@endsection
