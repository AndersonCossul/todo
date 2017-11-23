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
        // it will just fall here if the validation passed in StoreNewTodo
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        if ($todo)
            $todo->delete();

        return redirect()->back();
    }

    public function getUpdate($id)
    {
        $todo = Todo::find($id);
        if ($todo)
            return view('update')->with('todo', $todo);
        session()->put('error','Todo not found!');
        return redirect()->back();
    }
}
