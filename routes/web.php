<?php

Route::get('/', [
   'uses'  =>  'TodoController@index',
    'as'    =>  'home'
]);

Route::post('/todo/create', [
    'uses'  =>  'TodoController@store',
    'as'    =>  'todo.store'
]);
