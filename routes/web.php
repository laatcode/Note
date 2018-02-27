<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
  Route::get('/notebooks', 'NotebookController@showList');
  Route::post('/notebooks/create', 'NotebookController@create');
  Route::get('/notebooks/deleteNotebook/{notebookId}', 'NotebookController@delete');
  Route::get('/notebook/{notebook}', 'NotebookController@show');

  Route::post('/notebook/{id}/createNote', 'NoteController@create');
  Route::get('/notebook/{notebook}/note/{note}/{mode}', 'NoteController@show');
  Route::post('/notebook/{notebookId}/updateNote/{noteId}', 'NoteController@update');
  Route::get('/notebook/{notebookId}/deleteNote/{noteId}', 'NoteController@delete');
});
