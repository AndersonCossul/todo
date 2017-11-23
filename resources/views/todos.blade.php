@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('todo.store') }}" method="post">
                {{ csrf_field() }}
                <input name="todo" placeholder="Create new Todo" class="form-control input-lg">
            </form>
        </div>
    </div>

    <br/><br/>

    @foreach($todos as $todo)
        <hr>
        <p>{{ $todo->todo }}</p>
        @endforeach
        </div>

@endsection