@extends('auth.layouts')

@section('content')

<div>
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="post"> 
        @csrf
        @method('PATCH')

        <div>
            <label for="title">Title</label>
            <input 
                autofocus
                type="text"
                id="title"
                name="title"
                value="{{ $task->title }}"
            >            
        </div>

        <div>
            <label for="description">Description</label>
            <input 
                type="text"
                id="description"
                name="description"                
                value="{{ $task->description }}"
            >            
        </div>

        <div>
            <label for="deadline">Deadline</label>
            <input 
                type="date"
                id="deadline"
                name="deadline"                
                value="{{ $task->deadline }}"
            >            
        </div>        
        
        <button>Edit</button>
    </form>
</div>

@endsection