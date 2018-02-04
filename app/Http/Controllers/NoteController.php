<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller{

    function create(Request $request, $id){
      $note = Note::create([
        'title' => $request->input('title'),
        'text' => $request->input('text'),
        'notebook_id' => $id,
      ]);

      return redirect("/notebook/$id");
    }

    function show($notebookId, $noteId){
      $note = Note::find($noteId);
      return view('note', [
        'note' => $note,
        'notebookId' => $notebookId,
      ]);
    }

    function update(Request $request, $notebookId, $noteId){
      $note = Note::find($noteId);
      $note->title = $request->input('title');
      $note->text = $request->input('text');

      $note->save();
      return redirect("/notebook/$notebookId/note/$noteId");
    }

    function delete($notebookId, $noteId){
      Note::destroy($noteId);
      return redirect("/notebook/$notebookId");
    }
}
