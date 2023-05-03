@extends('auth.layouts')

@section('content')

    <h1>Tasks</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Deadline</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>        
        @foreach ($tasks as $task)        
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->deadline }}</td>
                <td>{{ $task->created_at }}</td>                
                <td>{{ $task->updated_at }}</td>
            </tr>
        @endforeach
</table>    


@endsection