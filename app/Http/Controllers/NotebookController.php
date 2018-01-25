<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;
use App\Note;

class NotebookController extends Controller{

  function showList(){
    $user = \Auth::user();
    $notebooks = Notebook::all()->where('owner', $user->id);
    return view('notebooks', [
      'notebooks' => $notebooks
    ]);
  }

    function create(Request $request){
      $user = \Auth::user();
      $notebook = Notebook::create([
        'title' => $request->input('name'),
        'description' => $request->input('description'),
        'owner' => $user->id,
      ]);
      return redirect('/notebook/' . $notebook->id);
    }

    function showNotebook($id){
      $notebook = Notebook::find($id);
      $notes = Note::all()->where('notebook_id', $id);
      return view('notebook', [
        'notebook' => $notebook,
        'notes' => $notes,
      ]);
    }
}
