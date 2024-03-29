@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">    
        <h1>Tasks</h1>
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>                
                <th>Updated at</th>
                <th>Actions</th>
            </tr>        
            @foreach ($tasks as $task)        
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ date('d-m-Y', strtotime($task->deadline)) }}</td>
                    <td>{{ $task->updated_at->format('d-m-Y') }}</td>
                    <td class="d-flex">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">E</a>                        
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">X</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </table>    
    </div>
</div>

@endsection