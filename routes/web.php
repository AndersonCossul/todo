<?php

Route::get('/', [
   'uses'  =>  'TodoController@index',
    'as'    =>  'home'
]);

Route::post('/todo/create', [
    'uses'  =>  'TodoController@store',
    'as'    =>  'todo.store'
]);

Route::get('/todo/delete/{id}', [
    'uses'  =>  'TodoController@delete',
    'as'    =>  'todo.delete'
]);
