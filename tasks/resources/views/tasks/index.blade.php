@extends('auth.layouts')

@section('content')

    <h1>Lista de Tarefas</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>
               {{ $task->name }}
            </li>
        @endforeach
    </ul>    


@endsection