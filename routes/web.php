<?php

Route::get('/', [
   'uses'  =>  'TodoController@index',
    'as'    =>  'home'
]);

Route::post('/todo/create', [
    'uses'  =>  'TodoController@store',
    'as'    =>  'todo.create'
]);

Route::get('/todo/edit/{id}', [
    'uses'  =>  'TodoController@edit',
    'as'    =>  'todo.edit'
]);

Route::patch('/todo/update/{id}', [
    'uses'  =>  'TodoController@update',
    'as'    =>  'todo.update'
]);

Route::get('/todo/mark-completed-state/{id}/{state}', [
    'uses'  =>  'TodoController@markCompletedState',
    'as'    =>  'todo.markcompletedstate'
]);
Route::get('/todo/delete/{id}', [
    'uses'  =>  'TodoController@destroy',
    'as'    =>  'todo.delete'
]);
