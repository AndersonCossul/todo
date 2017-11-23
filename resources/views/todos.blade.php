@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('todo.store') }}" method="post">
                {{ csrf_field() }}
                <input name="todo" placeholder="Create new Todo" autofocus class="form-control input-lg">
                @if ($errors->has('todo'))
                    <p class="alert-warning">{{ $errors->first('todo') }}</p>
                @endif
            </form>
        </div>
    </div>

    <br/><br/>

    @foreach ($todos as $todo)
        <hr>
        <p>{{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">x</a></p>
    @endforeach

@endsection