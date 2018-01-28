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

Route::get('/notebooks', 'NotebookController@showList')->middleware('auth');
Route::get('/notebook/{id}', 'NotebookController@showNotebook')->middleware('auth');
Route::post('/notebooks/create', 'NotebookController@create');

Route::get('/notebook/{notebookId}/note/{noteId}', 'NoteController@show')->middleware('auth');
Route::post('/notebook/{id}/createNote', 'NoteController@create')->middleware('auth');
Route::post('/notebook/{notebookId}/updateNote/{noteId}', 'NoteController@update')->middleware('auth');
