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

    @foreach ($todos as $todo)
        <hr>
        <p>
            {{ $todo->todo }}
            <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">x</a>
            <a href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="btn btn-info">Update</a>
        </p>
    @endforeach
@endsection