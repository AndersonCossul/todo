<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodo;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all()->sortByDesc('created_at');
        return view('todos')->with('todos', $todos);
    }

    public function store(StoreTodo $request)
    {
        // it will just fall here if the validation passed in StoreTodo
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        session()->put('success', 'Successfully created!');

        return redirect()->back();
    }

    public function getUpdate($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            return view('update')->with('todo', $todo);

        } catch (ModelNotFoundException $e) {
            session()->put('error', 'Todo not found!');
            return redirect()->back();
        }
    }

    public
    function postUpdate(StoreTodo $request, $id)
    {
        // again using custom request validation in StoreTodo
        try {
            $todo = Todo::findOrFail($id);

            $todo->todo = $request->todo;
            $todo->save();

            session()->put('success', 'Successfully updated!');

            return redirect()->route('home');

        } catch (ModelNotFoundException $e) {
            session()->put('error', 'Todo not found!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
            session()->put('success', 'Successfully deleted!');
        } catch (ModelNotFoundException $e) {
            session()->put('error', 'Todo not found!');
        } finally {
            return redirect()->back();
        }
    }
}
