<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all()->sortByDesc('created_at');

        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        $todo = new Todo;
        // column todo from table gets the input named todo in request
        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->back();
    }
}
