<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodo;
use App\Models\Todo;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $todo = Todo::create($request->all());

        session()->flash('success', 'Successfully created!');

        return redirect()->back();
    }

    public function edit($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            return view('update')->with('todo', $todo);

        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Todo not found!');
            return redirect()->back();
        }
    }

    public function update(StoreTodo $request, $id)
    {
        // again using custom request validation in StoreTodo
        try {
            $todo = Todo::findOrFail($id);

            $todo->todo = $request->todo;
            $todo->save();

            session()->flash('success', 'Successfully updated!');

            return redirect()->route('home');

        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Todo not found!');
            return redirect()->back();
        }
    }

    public function markCompletedState($id, $state)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->completed = $state;
            $todo->save();

            session()->flash('success', 'Marked as completed!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Todo not found!');
        } finally {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
            session()->flash('success', 'Successfully deleted!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Todo not found!');
        } finally {
            return redirect()->back();
        }
    }
}
