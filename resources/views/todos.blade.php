@extends('layout.master')
@section('title', 'Todos')
@section('content')

    <div class="row">
        <div class="col-lg-6 mt-5 col-centered">
            <form action="{{ route('todo.create') }}" method="post">
                {{ csrf_field() }}
                <input name="todo" placeholder="Create new Todo" autofocus class="form-control input-lg">
                @if ($errors->has('todo'))
                    <p class="alert-danger">{{ $errors->first('todo') }}</p>
                @endif
            </form>
        </div>
    </div>

    <br/><br/>

    <div class="row">
        @foreach ($todos as $todo)
            <hr class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <p class="{{ $todo->completed ? 'completed' : '' }}">{{ $todo->todo }}</p>
            </div>
            <div class="col-sm-4">
                @if (!$todo->completed)
                    <a href="{{ route('todo.markcompletedstate', ['id' => $todo->id, 'state' => '1']) }}" class="btn btn-success">Mark as Completed</a>
                @else
                    <a href="{{ route('todo.markcompletedstate', ['id' => $todo->id, 'state' => '0']) }}" class="btn btn-warning">Mark as Not Completed</a>
                @endif
                <a href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="btn btn-info">Update</a>
                <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">x</a>
            </div>
        @endforeach
    </div>
@endsection