<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewTodo;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all()->sortByDesc('created_at');
        return view('todos')->with('todos', $todos);
    }

    public function store(StoreNewTodo $request)
    {
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->back();
    }
}
