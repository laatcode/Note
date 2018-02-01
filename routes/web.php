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
  Route::get('/notebook/{id}', 'NotebookController@showNotebook');
  Route::get('/notebook/{notebookId}/note/{noteId}', 'NoteController@show');
  Route::post('/notebook/{id}/createNote', 'NoteController@create');
  Route::post('/notebook/{notebookId}/updateNote/{noteId}', 'NoteController@update');
  Route::post('/notebooks/create', 'NotebookController@create');
});
