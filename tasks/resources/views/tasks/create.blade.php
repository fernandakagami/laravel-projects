@extends('auth.layouts')

@section('content')

<div>
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="post"> 
        @csrf
    
        <div>
            <label for="title">Title</label>
            <input 
                autofocus
                type="text"
                id="title"
                name="title"                    
                value="{{ old('title') }}"
            >            
        </div>

        <div>
            <label for="description">Description</label>
            <input 
                type="text"
                id="description"
                name="description"                
                value="{{ old('description') }}"
            >            
        </div>

        <div>
            <label for="deadline">Deadline</label>
            <input 
                type="date"
                id="deadline"
                name="deadline"                
                value="{{ old('deadline') }}"
            >            
        </div>        
        
        <button>Add</button>
    </form>
</div>

@endsection