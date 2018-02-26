<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNotebookRequest;
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

    function create(CreateNotebookRequest $request){
      $user = \Auth::user();
      $notebook = Notebook::create([
        'title' => $request->input('name'),
        'description' => $request->input('description'),
        'owner' => $user->id,
      ]);
      return redirect('/notebook/' . $notebook->id);
    }

    public function show(Notebook $notebook){
      $notes = Note::where('notebook_id', $notebook->id)->orderBy('created_at', 'desc')->get();
      return view('notebook', [
        'notebook' => $notebook,
        'notes' => $notes,
      ]);
    }

    function delete($notebookId){
      Notebook::destroy($notebookId);
      return redirect("/notebooks");
    }
}
