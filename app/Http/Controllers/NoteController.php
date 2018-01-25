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
}
