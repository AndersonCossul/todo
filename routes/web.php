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

Route::get('/todo/mark-completed/{id}', [
    'uses'  =>  'TodoController@markAsCompleted',
    'as'    =>  'todo.markcompleted'
]);

Route::get('/todo/mark-not-completed/{id}', [
    'uses'  =>  'TodoController@markAsNotCompleted',
    'as'    =>  'todo.marknotcompleted'
]);

Route::get('/todo/delete/{id}', [
    'uses'  =>  'TodoController@destroy',
    'as'    =>  'todo.delete'
]);
